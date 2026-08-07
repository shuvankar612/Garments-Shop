@if ($image && file_exists(public_path('running-projects/' . $image)))
    <img src="{{ asset('running-projects/' . $image) }}" 
         width="60" height="60" 
         style="object-fit:cover; border-radius:4px;" />
@else
    <span class="badge bg-secondary">No Image</span>
@endif
