      <!-- Container to display the file link -->

      <div style="text-align: center;">
        <p class="fw-bold" style="font-size: 20px; margin: 20px ;">File uploaded successfully</p>
          <img src="{{ asset('assets/B.jpg') }}" alt="Good Job">
        <p>You did a great job!</p>
        <p>Click the link below to download your reward:</p>
      @if(isset($fileLink))
      <div>
          <a class="progress-bar bg-info" role="progressbar"  href="{{ $fileLink }}" target="_blank" >{{ $fileLink }}

          </a>

         @endif
        </div>

