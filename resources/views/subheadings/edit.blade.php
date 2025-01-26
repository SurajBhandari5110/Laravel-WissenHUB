<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subheading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Subheading</h1>

    <!-- Form for editing a subheading -->
    <form action="{{ route('subheadings.update', $subheading->subheading_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="content_id">Select Content Title</label>
            <select class="form-control" name="content_id" id="content_id" required>
                @foreach($contentTitles as $contentTitle)
                    <option value="{{ $contentTitle->content_id }}" {{ $contentTitle->content_id == $subheading->content_id ? 'selected' : '' }}>
                        {{ $contentTitle->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="title">Subheading Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $subheading->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Edit Content</label>
            <div id="editor-container"></div>
            <textarea name="content" id="content" style="display:none;">{{ $subheading->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Subheading</button>
        <a href="{{ route('subheadings.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    // Initialize Quill editor
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ header: '1'}, { header: '2'}, { font: [] }],
                [{ list: 'ordered'}, { list: 'bullet' }],
                ['bold', 'italic', 'underline'],
                [{ 'align': [] }],
                ['link', 'blockquote', 'code-block']
            ]
        }
    });

    // Set the initial content in the editor
    quill.root.innerHTML = document.querySelector('#content').value;

    // When the form is submitted, update the hidden textarea with Quill's content
    document.querySelector('form').addEventListener('submit', function () {
        document.querySelector('#content').value = quill.root.innerHTML;
    });
</script>
</body>
</html>
