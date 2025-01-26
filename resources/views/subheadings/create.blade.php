<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subheading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1>Create Subheading</h1>
    
    <!-- Form for creating a subheading -->
    <form action="{{ route('subheadings.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="content_id">Select Content Title</label>
            <select class="form-control" name="content_id" id="content_id" required>
                <option value="" disabled selected>Select a Content Title</option>
                @foreach($contentTitles as $contentTitle)
                    <option value="{{ $contentTitle->content_id }}">{{ $contentTitle->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="title">Subheading Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">Create a blog</label>
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Subheading</button>
    </form>
</div>

<script>
    let editorInstance;

    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });

    // Update the textarea before the form submission
    document.querySelector('form').addEventListener('submit', function (e) {
        const content = editorInstance.getData(); // Get the content from CKEditor
        document.querySelector('#content').value = content; // Update the textarea value
    });
</script>
</body>
</html>
