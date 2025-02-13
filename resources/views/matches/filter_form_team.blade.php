<!-- resources/views/matches/partials/filter_form.blade.php -->
<form method="GET" action="{{ request()->url() }}" class="mb-4" id="filterForm">
    <div class="row">
        <div class="col-md-4">
            <label for="status" class="form-label">Select Status</label>
            <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                <option value="">All Statuses</option>
                <option value="SCHEDULED" @if(request()->get('status') == 'SCHEDULED') selected @endif>SCHEDULED</option>
                <option value="FINISHED" @if(request()->get('status') == 'FINISHED') selected @endif>FINISHED</option>
  
            </select>
        </div>
        
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    
    $('#filterForm').submit(function(event) {
        event.preventDefault();  
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('team.matches', $teamId) }}", 
            method: 'GET',
            data: formData,
            success: function(response) {
                $('#matchesContainer').html(response);  
            },
            error: function() {
                alert('Erro ao carregar as partidas.');
            }
        });
    });
</script>