@extends ('layout')

@section ('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
@endsection

@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
        <form action="/articles" method="POST">
            @csrf

            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input
                        class="input @error('title') is-danger @enderror"
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea
                        name="excerpt"
                        id="excerpt"
                        class="textarea @error('excerpt') is-danger @enderror">
                        {{ old('excerpt') }}
                    </textarea>
                    @if ($errors->has('excerpt'))
                        <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea
                        name="body"
                        id="body"
                        class="textarea @error('body') is-danger @enderror">
                        {{ old('body') }}
                    </textarea>
                    @if ($errors->has('body'))
                        <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Tags</label>
                <div class="select is-multiple control">
                    <select name="tags[]" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                    </select>
                    @error('tags')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-link">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
