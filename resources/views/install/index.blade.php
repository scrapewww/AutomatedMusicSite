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
            <br />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-push-4">
            <form method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="APP_NAME">Site Name</label>
                    <input type="text" class="form-control" name="APP_NAME" id="APP_NAME" placeholder="Site Name" required>
                </div>
                <div class="form-group">
                    <label for="APP_URL">Site URL</label>
                    <input type="url" class="form-control" name="APP_URL" id="APP_URL" placeholder="Site URL" required>
                </div>
                <div class="form-group">
                    <label for="DMCA_EMAIL">DMCA Email</label>
                    <input type="email" class="form-control" name="DMCA_EMAIL" id="DMCA_EMAIL" placeholder="DMCA Email Address" required>
                </div>

                <hr />

                <div class="form-group">
                    <label for="META_TITLE">Meta Title</label>
                    <input type="text" class="form-control" name="META_TITLE" id="META_TITLE" placeholder="Meta Title" required>
                </div>
                <div class="form-group">
                    <label for="META_KEYWORDS">Meta Keywords</label>
                    <input type="text" class="form-control" name="META_KEYWORDS" id="META_KEYWORDS" placeholder="Meta Keywords">
                </div>
                <div class="form-group">
                    <label for="META_DESCRIPTION">Meta Description</label>
                    <textarea class="form-control" name="META_DESCRIPTION" id="META_DESCRIPTION" placeholder="Meta Description"></textarea>
                </div>

                <hr />

                <div class="form-group">
                    <label for="DB_HOST">DB Host</label>
                    <input type="text" class="form-control" name="DB_HOST" id="DB_HOST" placeholder="localhost" required>
                </div>
                <div class="form-group">
                    <label for="DB_PORT">DB Port</label>
                    <input type="text" class="form-control" name="DB_PORT" id="DB_PORT" placeholder="3306" required>
                </div>
                <div class="form-group">
                    <label for="DB_USERNAME">DB Username</label>
                    <input type="text" class="form-control" name="DB_USERNAME" id="DB_USERNAME" placeholder="DB Username" required>
                </div>
                <div class="form-group">
                    <label for="DB_PASSWORD">DB Password</label>
                    <input type="text" class="form-control" name="DB_PASSWORD" id="DB_PASSWORD" placeholder="DB Password" required>
                </div>
                <div class="form-group">
                    <label for="DB_DATABASE">DB Name</label>
                    <input type="text" class="form-control" name="DB_DATABASE" id="DB_DATABASE" placeholder="DB Name" required>
                </div>

                <hr />

                <div id="API_KEY_AREA">

                    <div class="form-group">
                        <label for="LE_API_KEY">API Key</label>
                        <input type="text" class="form-control" name="LE_API_KEY" id="LE_API_KEY" placeholder="API Key" required>
                    </div>
                    <span id="helpBlock" class="help-block">
                        Don't have one yet? <a target="_blank" href="http://www.leakedearly.com/api">Get one here.</a>
                    </span>

                </div>

                <hr />

                <div class="form-group">
                    <label for="BULK_IMPORT">Run Bulk Import?</label>
                    <select class="form-control" name="BULK_IMPORT" id="BULK_IMPORT">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span id="helpBlock" class="help-block">
                        This will import all content currently available via API.
                        <br />
                        <small class="text-danger">Warning: images are imported on your server so this could take up a lot of space.</small>
                    </span>
                </div>

                <button type="submit" class="btn btn-default">Install</button>
                <br /><br /><br />
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>