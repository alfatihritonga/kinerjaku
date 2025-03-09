@if (session()->has('success'))
    <div id="alert-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div id="alert-message" class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('warning'))
    <div id="alert-message" class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

<script>
    setTimeout(function() {
        let alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);
</script>
