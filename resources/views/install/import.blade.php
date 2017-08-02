<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LeakedEarly Clone Install</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Automated Music Site</h1>
            <h3 class="text-center">Installation Wizard</h3>
            <p class="text-center">Wait for all imports to complete and then hit the continue button below.</p>
            <br />
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Tracks Import Progress</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/scrape/tracks?import=1&token='.Request::input('token')) }}"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Videos Import Progress</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/scrape/videos?import=1&token='.Request::input('token')) }}"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Albums Import Progress</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/scrape/albums?import=1&token='.Request::input('token')) }}"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Mixtapes Import Progress</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/scrape/mixtapes?import=1&token='.Request::input('token')) }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <form method="post">
                {{ csrf_field() }}
                <input class="btn btn-primary btn-lg" type="submit" value="Continue" />
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>