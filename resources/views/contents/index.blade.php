@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <h5>Drafts</h5>
        </div>
        <div class="col-md-10">
            <table class="table table-hover">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Last Update</th>
                </tr>
                @forelse($drafts as $draft)
                    <tr>
                        <td>
                            <a href="{{ route('i.contents.edit', ['contents' => $draft->slug]) }}">{{ $draft->title }}</a>
                        </td>
                        <td>{{ $draft->author->email }}</td>
                        <td>{{ $draft->type->name }}</td>
                        <td>@time($draft->updated_at, 'diffForHumans')</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="placeholder-block">
                            <h4>No drafts.</h4>
                            <p>
                                No drafts? <a href="{{ route('i.contents.create') }}">Just start, it keeps going from there!</a>
                            </p>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <h5>Published</h5>
        </div>
        <div class="col-md-10">
            <table class="table table-hover">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Published</th>
                </tr>
                @forelse($published as $content)
                    <tr>
                        <td>
                            <a href="{{ route('i.contents.edit', ['contents' => $content->slug]) }}">{{ $content->title }}</a>
                        </td>
                        <td>{{ $content->author->email }}</td>
                        <td>{{ $content->type->name }}</td>
                        <td>@time($content->published_at, 'diffForHumans')</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="placeholder-block">
                            <h4>No published contents.</h4>
                            <p>
                                Don't be afraid, just hit Save & Publish!
                            </p>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@stop