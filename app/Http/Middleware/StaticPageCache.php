<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaticPageCache
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() !== 'GET' || $request->query()) {
            return $next($request);
        }

        $path = urldecode(trim($request->path(), '/'));
        
        // Ensure the filename length doesn't exceed filesystem limits (255 chars)
        // If it's still too long after decoding, we hash the basename as a fallback
        $pathParts = explode('/', $path ?: 'home');
        $basename = array_pop($pathParts);
        
        if (strlen($basename) > 240) {
            $basename = md5($basename);
        }
        
        $pathParts[] = $basename;
        $safePath = implode('/', $pathParts);
        
        $file = public_path('static/' . $safePath . '.html');

        if (file_exists($file)) {
            return response()->file($file, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
        }

        $response = $next($request);

        if ($response->getStatusCode() === 200) {
            if (!is_dir(dirname($file))) {
                mkdir(dirname($file), 0755, true);
            }

            $cachedContent = $response->getContent() . "\n<!-- SERVED FROM STATIC CACHE -->";
            file_put_contents($file, $cachedContent);
            
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
        }

        return $response;
    }
}
