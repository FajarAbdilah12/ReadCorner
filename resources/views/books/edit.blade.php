<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(45deg, rgba(100, 149, 237, 0.85), rgba(70, 130, 180, 0.85)),
                              url('https://cdn.pixabay.com/photo/2016/06/23/17/50/library-1472936_1280.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #1e3a8a;
            margin-bottom: 30px;
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 .fas {
            margin-right: 10px;
            color: #1e3a8a;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .btn-success, .btn-back {
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .btn-success {
            background: linear-gradient(45deg, #28a745, #218838);
            border: none;
            color: white;
        }
        .btn-success:hover {
            background: linear-gradient(45deg, #218838, #28a745);
            transform: translateY(-2px);
        }
        .btn-back {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            color: white;
        }
        .btn-back:hover {
            background: linear-gradient(45deg, #0056b3, #007bff);
            transform: translateY(-2px);
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1><i class="fas fa-book"></i> Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" class="form-control" value="{{ $book->publisher }}" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('books.index') }}" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>

</body>
</html>
