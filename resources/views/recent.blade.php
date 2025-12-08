@use('App\Models\User')
@use('App\Models\Department')
@use('App\Models\Rent')

<x-layout title="Recent Activities">
    <style>
        .dashboard-container {
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-title {
            color: #5d4037;
            text-align: center;
            margin-bottom: 40px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
        }

        .activity-card {
            background-color: #f5f5f5;
            border: 2px solid #c8a87a;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 8px rgba(93, 64, 55, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .card-title {
            color: #5d4037;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title-icon {
            font-size: 24px;
        }

        .view-all-btn {
            background-color: #c8a87a;
            color: #5d4037;
            border: 2px solid #c8a87a;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .view-all-btn:hover {
            background-color: #b89a6a;
            border-color: #b89a6a;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #e8e8e8;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(93, 64, 55, 0.1);
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .user-icon { background-color: #e3f2fd; color: #1976d2; }
        .department-icon { background-color: #f3e5f5; color: #7b1fa2; }
        .contract-icon { background-color: #e8f5e8; color: #388e3c; }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            color: #5d4037;
            font-weight: bold;
            margin-bottom: 4px;
            font-size: 15px;
        }

        .activity-details {
            color: #7d6b5a;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .activity-time {
            color: #9e9e9e;
            font-size: 12px;
            font-weight: 500;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
            margin-left: 8px;
        }

        .verified { background-color: #4caf50; color: white; }
        .pending { background-color: #ff9800; color: white; }
        .rejected { background-color: #f44336; color: white; }
        .onRent { background-color: #2196f3; color: white; }
        .completed { background-color: #4caf50; color: white; }
        .cancelled { background-color: #f44336; color: white; }

        .user-link, .department-link, .contract-link {
            color: #5d4037;
            text-decoration: none;
            font-weight: bold;
        }

        .user-link:hover, .department-link:hover, .contract-link:hover {
            color: #c8a87a;
            text-decoration: underline;
        }

        .empty-state {
            text-align: center;
            color: #9e9e9e;
            font-style: italic;
            padding: 30px;
            font-size: 14px;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: linear-gradient(135deg, #c8a87a 0%, #b89a6a 100%);
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            color: #5d4037;
            box-shadow: 0 4px 8px rgba(93, 64, 55, 0.2);
        }

        .stat-value {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 600;
            opacity: 0.9;
        }
    </style>

    <div class="dashboard-container">
        <h1 class="dashboard-title">Recent Activities Dashboard</h1>
        
        <!-- Statistics Cards -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-value">{{ $totalUsers ?? User::count()-1 }}</div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $totalDepartments ?? Department::count() }}</div>
                <div class="stat-label">Total Departments</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $totalContracts ?? Rent::where('status', 'onRent')->count() }}</div>
                <div class="stat-label">Active Contracts</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $pendingUsers ?? User::where('verification_state', 'pending')->count() }}</div>
                <div class="stat-label">Pending Verifications</div>
            </div>
        </div>
        
        <div class="dashboard-grid">
            <div class="activity-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <span class="card-title-icon">👤</span>
                        Recent Users
                    </h2>
                    <a href="/users" class="view-all-btn">All Users</a>
                </div>
                
                <div class="activity-list">
                    @forelse($recentUsers as $user)
                        <div class="activity-item">
                            <div class="activity-icon user-icon">👤</div>
                            <div class="activity-content">
                                <div class="activity-title">
                                    <a href="/users/{{$user->id}}" class="user-link">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </a>
                                    <span class="status-badge {{ $user->verification_state }}">
                                        {{ ucfirst($user->verification_state) }}
                                    </span>
                                </div>
                                <div class="activity-details">
                                    📞 {{ $user->phone ?? 'N/A' }}
                                </div>
                                <div class="activity-time">
                                    Joined {{ $user->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">No recent users found</div>
                    @endforelse
                </div>
            </div>
            
            <!-- Recent Departments Card -->
            <div class="activity-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <span class="card-title-icon">🏠</span>
                        Recent Departments
                    </h2>
                    <a href="/departments" class="view-all-btn">All Departments</a>
                </div>
                
                <div class="activity-list">
                    @forelse($recentDepartments as $department)
                        <div class="activity-item">
                            <div class="activity-icon department-icon">🏠</div>
                            <div class="activity-content">
                                <div class="activity-title">
                                    <a href="/departments/{{$department->id}}" class="department-link">
                                        {{ $department->location['city'] ?? 'N/A' }}, {{ $department->location['district'] ?? 'N/A' }}
                                    </a>
                                    <span class="status-badge {{ $department->status }}">
                                        {{ ucfirst($department->status) }}
                                    </span>
                                </div>
                                <div class="activity-details">
                                    📏 {{ $department->area }}m² • 🛏️ {{ $department->bedrooms }} Bed • 🚿 {{ $department->bathrooms }} Bath
                                    @if($department->user)
                                        • 👤 {{ $department->user->first_name }} {{ $department->user->last_name }}
                                    @endif
                                </div>
                                <div class="activity-time">
                                    Added {{ $department->created_at->diffForHumans() }}
                                    • ${{ number_format($department->rent_fee) }}/month
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">No recent departments found</div>
                    @endforelse
                </div>
            </div>
            
            <div class="activity-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <span class="card-title-icon">📄</span>
                        Recent Contracts
                    </h2>
                    <a href="/contracts" class="view-all-btn">All Contracts</a>
                </div>
                
                <div class="activity-list">
                    @forelse($recentContracts as $contract)
                        <div class="activity-item">
                            <div class="activity-icon contract-icon">📄</div>
                            <div class="activity-content">
                                <div class="activity-title">
                                    <a href="contracts/{{$contract->id}}" class="contract-link">
                                        Contract #{{ $contract->id }}
                                    </a>
                                    <span class="status-badge {{ $contract->status }}">
                                        {{ ucfirst($contract->status) }}
                                    </span>
                                </div>
                                <div class="activity-details">
                                    👤 {{ $contract->user->first_name ?? 'N/A' }} 
                                    → 🏠 {{ $contract->department->location['city'] ?? 'N/A' }}
                                    @if($contract->department->user)
                                        • 👤 {{ $contract->department->user->first_name }}
                                    @endif
                                </div>
                                <div class="activity-time">
                                    Created {{ $contract->created_at->diffForHumans() }}
                                    • ${{ number_format($contract->rent_fee) }}/month
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">No recent contracts found</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>