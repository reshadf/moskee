@extends('site.layouts.default')

@section('content')

<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail aside">
            <div class="caption">
                <h3>Gebedstijden <span class="glyphicon glyphicon-leaf"></span></h3>
                <table class="gebedstijden">
                    <tr>
                        <th>gebed</th>
                        <th>Tijd</th>
                    </tr>
                @foreach($timetable->{$datum->day} as $time => $v)
                    <tr>
                        <td class="time">{{ $time }}</td>
                        <td>{{ $v }}</td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
        <div class="thumbnail aside">
            <img src="assets/img/ideal_logo.jpg" alt="donatie">
            <div class="caption">
                <h3>Steun Abu-Hanifa <span class="glyphicon glyphicon-heart"></span></h3>
                    {{ Form::open(array('url' => 'donation/payment', 'accept-charset' => 'utf8')) }}
                <div class="input-group">
                    <span class="input-group-addon">&euro;</span>
                    <input type="text" class="form-control" name="bedrag" placeholder="bedrag">
                       <span class="input-group-btn">
                        <button class="btn btn-success" type="button">Doneer!</button>
                       </span>
                </div>
                    {{ Form::close() }}
            </div>
        </div>
        <div class="thumbnail aside">
            <div class="caption">
                <h3>Evenementen <span class="glyphicon glyphicon glyphicon-calendar"></span></h3>
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        Vergadering
                        <span class="badge">14-02-2014</span>
                    </a>
                    <a href="#" class="list-group-item">Bijeenkomst  <span class="badge">14-02-2014</span></a>
                    <a href="#" class="list-group-item">Vergadering  <span class="badge">14-02-2014</span></a>
                    <a href="#" class="list-group-item">Nieuwjaar  <span class="badge">15-02-2014</span></a>
                    <a href="#" class="list-group-item">Bespreking  <span class="badge">19-02-2014</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-8">
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8">
                <!-- Post Title -->
                <div class="row">
                    <div class="col-md-8">
                        <h4><strong><a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a></strong></h4>
                    </div>
                </div>
                <!-- ./ post title -->

                <!-- Post Content -->
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{{ $post->url() }}}" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
                    </div>
                    <div class="col-md-6">
                        <p>
                            {{ String::tidy(Str::limit($post->content, 200)) }}
                        </p>
                        <p><a class="btn btn-mini btn-default" href="{{{ $post->url() }}}">Lees verder</a></p>
                    </div>
                </div>
                <!-- ./ post content -->

                <!-- Post Footer -->
                <div class="row">
                    <div class="col-md-8">
                        <p></p>
                        <p>
                            <span class="glyphicon glyphicon-user"></span> door <span class="muted">{{{ $post->author->username }}}</span>
                            | <span class="glyphicon glyphicon-calendar"></span> <!--Sept 16th, 2012-->{{{ $post->date() }}}
                            | <span class="glyphicon glyphicon-comment"></span> <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
                        </p>
                    </div>
                </div>
                <!-- ./ post footer -->
            </div>
        </div>

        <hr />
        @endforeach

        {{ $posts->links() }}

        @stop
    </div>
</div>

@stop

