@session('success')
<div class="bg-green-50 text-green-500 p-4 rounded-md" role="alert">
  {{ $value }}
</div>
@endsession
      
@session('error')
<div class="bg-red-50 text-red-500 p-4 rounded-md" role="alert">
  {{ $value }}
</div>
@endsession