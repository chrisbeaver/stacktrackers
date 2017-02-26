<div class="column is-3">
    <aside class="menu">
        <p class="menu-label">
            My Holdings
        </p>
        <ul class="menu-list">
            <li><a href="{{ action('HoldingController@showMyHoldings') }}">View Stack</a></li>
            <li><a href="{{ action('HoldingController@showNewForm') }}">Add Piece</a></li>
        </ul>
        <p class="menu-label">
            Market Place
        </p>
        <ul class="menu-list is-disabled" >
            <li><a style="color: #dbdbdb;">My Offers</a></li>
            <li><a style="color: #dbdbdb;">List Piece</a></li>
            <li><a style="color: #dbdbdb;">Transaction History</a></li>
        </ul>
        <p class="menu-label">
            Reports
        </p>
        <ul class="menu-list is-disabled">
            <li><a style="color: #dbdbdb;">Generate CSV</a></li>
            <li><a style="color: #dbdbdb;">Generate PDF</a></li>
        </ul>
        <p class="menu-label">
            Support
        </p>
        <ul class="menu-list">
            <li><a>FAQ</a></li>
            <li><a>Contact Us</a></li>
        </ul>
    </aside>
</div>