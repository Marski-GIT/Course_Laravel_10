<form method="post" action="{{route('logout')}}">
    @csrf
    <button type="submit" class="tracking-widest hover:text-stone-500">Logout</button>
</form>
