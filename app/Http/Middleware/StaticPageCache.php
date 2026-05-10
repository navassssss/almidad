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

        $path = trim($request->path(), '/');
        $file = public_path('static/' . ($path ?: 'home') . '.html');

        if (file_exists($file)) {
            return response()->file($file);
        }

        $response = $next($request);

        if ($response->getStatusCode() === 200) {
            if (!is_dir(dirname($file))) {
                mkdir(dirname($file), 0755, true);
            }

            $cachedContent = $response->getContent() . "\n<!-- SERVED FROM STATIC CACHE -->";
            file_put_contents($file, $cachedContent);
        }

        return $response;
    }
}
