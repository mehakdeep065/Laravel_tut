<!DOCTYPE html>
<html lang="en" data-theme="{{ $activeDaisyTheme ?? 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show_form</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-base-200 flex justify-center items-center h-screen">

    <div class="card w-full max-w-md shadow-xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-center">Upload Your Website</h2>

            <form action="/submitweb" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Website Name</span>
                    </div>
                    <input type="text" name="webname" id="webname"
                        value="{{ old('webname') }}"
                        class="input input-bordered w-full" />
                </label>

                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Website Description</span>
                    </div>
                    <textarea name="webdes" id="webdes" rows="4"
                        class="textarea textarea-bordered">{{ old('webdes') }}</textarea>
                </label>

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Upload ZIP File</span>
                    </div>
                    <input type="file" name="zipfile" required class="file-input file-input-bordered w-full" />
                </label>

                <button type="submit" class="btn btn-primary mt-4">
                    Upload Website
                </button>
            </form>
        </div>
    </div>

</body>

</html>
