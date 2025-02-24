@if (session($success))
<div style="background:green;">{{ session($success) }}</div>
@elseif(session($error))
<div style="background: red;">{{ session($error) }}</div>
@elseif(session($alert))
    <script>
        window.alert('{{ session($alert) }}');
    </script>
@endif
