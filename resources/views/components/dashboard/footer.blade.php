<footer>
  <div class="footer clearfix mb-0 text-muted">
    <div class="float-start">
      <p>Copyright &copy; 2025 <a href="{{ route('dashboard') }}">Dashboard Aplikasi Retur Barang</a></p>
    </div>
    <div class="float-end">
      @hasrole('admin-retur') <p>Admin Retur : <span class="text-success">@auth {{ auth()->user()->name }} @else User @endauth </span></p> @endhasrole
      @hasrole('logistik') <p>Logistik : <span class="text-success">@auth {{ auth()->user()->name }} @else User @endauth </span></p> @endhasrole
      @hasrole('warehouse-retur') <p>Warehouse Retur : <span class="text-success">@auth {{ auth()->user()->name }} @else User @endauth </span></p> @endhasrole
      @hasrole('warehouse-asisten') <p>Warehouse Asisten : <span class="text-success">@auth {{ auth()->user()->name }} @else User @endauth </span></p> @endhasrole
    </div>
  </div>
</footer>
