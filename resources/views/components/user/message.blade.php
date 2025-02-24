@if (session($success))
<div id="hideDiv" style="background:green;">{{ session($success) }}</div>
@elseif(session($error))
<div id="hideDiv" style="background: red;">{{ session($error) }}</div>
@elseif(session($alert))
    <script>
        window.alert('{{ session($alert) }}');
    </script>
@endif
