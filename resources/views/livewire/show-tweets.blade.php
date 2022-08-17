<div>
    Tweets
    <form method="POST" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content">
        @error('content')
            {{ $message }}
        @enderror
        <button type="submit">Tweetar</button>
    </form>
    <hr>

    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>

        @if ($tweet->likes->count())
            <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
</div>
