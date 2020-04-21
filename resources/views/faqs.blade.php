<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styleFaqs.css">
    <title>Faq's</title>
    <link rel="shortcut icon" href="{{URL::asset('/icon/iconoPrincipal.jpg')}}" type="image/x-icon">
</head>

<body>
  @if (session('log'))
      @include('layouts.header')
  @else
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-primary" href="/" role="button">Go Back</a>
    </nav>
    </header>
  @endif
    <div class="container col-xl-7 pt-5 text-center ">
        <main>
            <h1 class="title pb-5 mb-0 border-bottom-0 border bg-light pt-5">Preguntas frecuentes</h1>
            <div class="accordion " id="accordionExample">
                <div class="card">
                  <div class="card-header bg-white" id="headingOne">
                    <h2 class="mb-0 ">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Question 1
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      Answer 1
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-white" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Question 2
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      Answer 2
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-white" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Question 3
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Answer 3
                    </div>
                  </div>
                </div>
                <div class="card">
                    <div class="card-header bg-white" id="headingFour">
                      <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Question 4
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                      <div class="card-body">
                        Answer 4
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header bg-white" id="headingFive">
                      <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Question 5
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                      <div class="card-body">
                        Answer 5
                      </div>
                    </div>
                  </div>
              </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>