<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Article::with(['category', 'author'])->where('slide', true)->latest()->take(4)->get();
        if ($slides->count() < 4) {
            $slides = $slides->merge(
                Article::with(['category', 'author'])->where('slide', false)->orderByDesc('views')->take(4 - $slides->count())->get()
            );
        }

        $current = Article::with(['category', 'author'])->where('current', true)->latest()->take(3)->get();
        if ($current->count() < 3) {
            $current = $current->merge(
                Article::with(['category', 'author'])->where('current', false)->latest()->take(3 - $current->count())->get()
            );
        }

        $featured = Article::with(['category', 'author'])->where('featured', true)->latest()->take(6)->get();
        if ($featured->count() < 6) {
            $fallbackFeatured = Article::with(['category', 'author'])->where('featured', false)
                ->orderByDesc('views')
                ->latest()
                ->take(6 - $featured->count())
                ->get();
            $featured = $featured->merge($fallbackFeatured);
        }

        $news = News::latest()->take(3)->get();

        return view('welcome', [
            'featuredd' => $featured,
            'slides'    => $slides,
            'currents'  => $current,
            'newss'     => $news,
        ]);
    }


 

  
    public function show(Category $category, Article $article)
    {
        $article->load('author');

        $count = 6;

        $articles = Article::with(['author', 'category'])
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take($count)
            ->get();

        if ($articles->count() < $count) {
            $articles = $articles->merge(
                Article::with(['author', 'category'])
                    ->where('author_id', $article->author_id)
                    ->where('id', '!=', $article->id)
                    ->latest()
                    ->take($count - $articles->count())
                    ->get()
            )->unique('id');
        }

        if ($articles->count() < $count) {
            $articles = $articles->merge(
                Article::with(['author', 'category'])
                    ->where('id', '!=', $article->id)
                    ->latest()
                    ->take($count - $articles->count())
                    ->get()
            )->unique('id');
        }

        $ad = Ad::first();

        return view('page', compact('article', 'articles', 'ad'));
    }




    public function categoryShow(Category $category)
    {
        $articles = $category->articles()
            ->orderByDesc('created_at')
            ->paginate(6);
        return view('category', compact('articles', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $articles = Article::with(['author', 'category'])
            ->where(function ($query) use ($search) {
                $query->where('topic', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->orWhereHas('author', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('a_name', 'like', '%' . $search . '%');
                    });
            })
            ->orderByRaw("CASE WHEN topic LIKE ? THEN 0 ELSE 1 END", ["%{$search}%"])
            ->orderByDesc('created_at')
            ->paginate(6);

        // dd($articles, $search);
        return view('search', compact('articles', 'search'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
