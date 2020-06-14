<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticlesController extends Controller
{

    public function show(Article $article) {
        return view('articles.show', ['article' => $article]);
    }

    public function index() {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::all();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    public function create() {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    public function store() {
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(request('tags'));
        return redirect('/articles');
    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article) {
        $article->update($this->validateArticle());
        return redirect('/articles/' . $article->id);
    }

    public function destroy() {

    }

    protected function validateArticle() {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }

}
