












<li class="nav-item {{ Request::is('expenses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('expenses.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Expenses</span>
    </a>
</li>

<li class="nav-item {{ Request::is('accounts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('accounts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Accounts</span>
    </a>
</li>
<li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('customers.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Customers</span>
    </a>
</li>

<li class="nav-item {{ Request::is('posts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('posts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Posts</span>
    </a>
</li>
<li class="nav-item {{ Request::is('transactions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Transactions</span>
    </a>
</li>
<li class="nav-item {{ Request::is('cashes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cashes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Cashes</span>
    </a>
</li>
