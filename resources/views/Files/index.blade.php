<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Welcome</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />

    <!-- Add icon library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <style>
      .text-center {
        margin-top: 4.375rem;
        font-size: 2.5rem;
        color: brown;
      }

      .content {
        width: 39rem;
        margin: 6.25rem auto;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .btn {
        padding: 0.9375rem 1.5625rem;
      }
      .img {
        width: 31.25rem;
      }
      @media (max-width: 45rem) {
        .text-center {
          font-size: 2rem;
        }
        .content {
          flex-direction: column;
        }
        .img {
          width: 21.25rem;
          margin-top: -3.25rem;

          margin-bottom: 1.25rem;
        }
      }
    </style>
  </head>
  <body>
    <section>
      <h1 class="text-center">Welcome to my website</h1>
      <div class="content">
        <img class="img" src="assets/A.jpg" />

        <button class="btn" style="width: 100%">
          <a
            href="{{ route('Files.create') }}"
            type="button"
            class="btn btn-danger"
          >
            <i class="fa fa-upload"></i> Upload</a
          >
        </button>
      </div>
    </section>
  </body>
</html>
