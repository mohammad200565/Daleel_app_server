<x-layout title="Contracts">
    <style>
        .contracts-container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .contracts-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .contracts-title {
            color: #5d4037;
            text-align: center;
            margin: 0;
        }

        .search-filter-container {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-box {
            padding: 10px 15px;
            border: 2px solid #c8a87a;
            border-radius: 6px;
            background-color: white;
            color: #5d4037;
            font-size: 14px;
            width: 250px;
        }

        .search-btn, .filter-btn {
            background-color: #c8a87a;
            color: #5d4037;
            border: 2px solid #c8a87a;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .search-btn:hover, .filter-btn:hover {
            background-color: #b89a6a;
            border-color: #b89a6a;
        }

        .filter-btn.active {
            background-color: #5d4037;
            color: #f5f5f5;
            border-color: #5d4037;
        }

        .clear-filter {
            background-color: transparent;
            color: #5d4037;
            border: 2px solid #c8a87a;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .clear-filter:hover {
            background-color: #c8a87a;
            color: #5d4037;
        }

        .contracts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .rent-card {
            background-color: #f5f5f5;
            border: 2px solid #c8a87a;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 4px rgba(93, 64, 55, 0.1);
            transition: all 0.3s ease;
        }

        .rent-card-link:hover .rent-card {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(93, 64, 55, 0.15);
        }

        .rent-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .rent-id {
            color: #5d4037;
            font-weight: bold;
            font-size: 16px;
        }

        .rent-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .rent-status.cancelled {
            background-color: #f44336;
            color: white;
        }

        .rent-status.pending {
            background-color: #ff9800;
            color: white;
        }

        .rent-status.completed {
            background-color: #4caf50;
            color: white;
        }

        .rent-status.onRent {
            background-color: #2196f3;
            color: white;
        }

        .rent-parties {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #f9f7f2 0%, #c8a87a 100%);
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e8e8e8;
        }

        .party-info {
            flex: 1;
            text-align: center;
        }

        .party-label {
            color: #7d6b5a;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .party-name {
            color: #5d4037;
            font-weight: bold;
            font-size: 16px;
        }

        .rent-arrow {
            color: #c8a87a;
            font-size: 20px;
            font-weight: bold;
            padding: 0 20px;
        }

        .department-info {
            margin-bottom: 20px;
        }

        .department-location {
            color: #5d4037;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .department-specs {
            display: flex;
            gap: 10px;
        }

        .spec {
            background-color: #c8a87a;
            color: #5d4037;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .rent-details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-bottom: 20px;
        }

        .rent-period {
            
            margin-right: 5px;
        }

        .detail-label {
            color: #7d6b5a;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #5d4037;
            font-weight: bold;
            font-size: 14px;
        }

        .detail-value.warning {
            color: #f44336;
        }

        .rent-footer {
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
            text-align: right;
        }

        .created-date {
            color: #9e9e9e;
            font-size: 12px;
        }

        .no-contracts {
            text-align: center;
            color: #5d4037;
            font-size: 18px;
            margin-top: 50px;
            grid-column: 1 / -1;
        }

        .rent-card-link {
            text-decoration: none;
            color: inherit;
        }

        .department-specs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .spec-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #deb884ff;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #e8e8e8;
            min-width: 60px;
        }

        .spec-value {
            color: #5d4037;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .spec-label {
            color: #7d6b5a;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .active-filters {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-info {
            color: #5d4037;
            font-size: 14px;
            background-color: #c8a87a;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .status-filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .status-filter-btn {
            background-color: #f5f5f5;
            color: #5d4037;
            border: 2px solid #c8a87a;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .status-filter-btn:hover, .status-filter-btn.active {
            background-color: #c8a87a;
            color: #5d4037;
        }

        .contract-summary .detail-value {
            font-weight: bold;
        }

        .summary-completed {
            color: #4caf50;
        }

        .summary-cancelled {
            color: #f44336;
        }

        .rent-details > div {
            min-height: 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>

    <div class="contracts-container">
        <div class="contracts-header">
            <h1 class="contracts-title">Rental Contracts</h1>
            
            <div class="search-filter-container">
                <!-- Search Form -->
                <form method="GET" action="{{ route('contracts.index') }}" style="display: flex; gap: 10px;">
                    <input 
                        type="text" 
                        name="search" 
                        class="search-box" 
                        placeholder="Search by name or location..." 
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="search-btn">Search</button>
                </form>
            </div>
        </div>

        <!-- Status Filters -->
        <div class="status-filters">
            <form method="GET" action="{{ route('contracts.index') }}" style="display: inline;">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <button 
                    type="submit" 
                    name="filter" 
                    value="" 
                    class="status-filter-btn {{ !request('filter') ? 'active' : '' }}"
                >
                    All Contracts
                </button>
                <button 
                    type="submit" 
                    name="filter" 
                    value="onRent" 
                    class="status-filter-btn {{ request('filter') === 'onRent' ? 'active' : '' }}"
                >
                    Active Rentals
                </button>
                <button 
                    type="submit" 
                    name="filter" 
                    value="pending" 
                    class="status-filter-btn {{ request('filter') === 'pending' ? 'active' : '' }}"
                >
                    Pending
                </button>
                <button 
                    type="submit" 
                    name="filter" 
                    value="completed" 
                    class="status-filter-btn {{ request('filter') === 'completed' ? 'active' : '' }}"
                >
                    Completed
                </button>
                <button 
                    type="submit" 
                    name="filter" 
                    value="cancelled" 
                    class="status-filter-btn {{ request('filter') === 'cancelled' ? 'active' : '' }}"
                >
                    Cancelled
                </button>
            </form>
        </div>

        <!-- Active Filters Display -->
        @if(request('search') || request('filter'))
            <div class="active-filters">
                <span class="filter-info">
                    Active filters:
                    @if(request('search'))
                        Search: "{{ request('search') }}"
                    @endif
                    @if(request('filter'))
                        {{ request('search') ? ' | ' : '' }}Status: {{ ucfirst(request('filter')) }}
                    @endif
                </span>
                <a href="{{ route('contracts.index') }}" class="clear-filter">Clear All Filters</a>
            </div>
        @endif
        
        <div class="contracts-grid">
            @forelse($rents as $rent)
                @php 
                    logger($rent);
                @endphp
                <x-contract-card :rent="$rent" />
            @empty
                <div class="no-contracts">
                    @if(request('search') || request('filter'))
                        No contracts found matching your criteria.
                    @else
                        No rental contracts found in the database.
                    @endif
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        {{ $rents->withQueryString()->links('vendor.pagination.default') }}
    </div>
</x-layout>