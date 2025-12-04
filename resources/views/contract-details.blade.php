@php
    use Carbon\Carbon;

    $today = now();
    $startDate = Carbon::parse($rent->startRent);
    $endDate = Carbon::parse($rent->endRent);
@endphp

<x-layout title="Contract #{{ $rent->id }} Details">
    <style>
        .contract-detail-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px;
        }

        .btn-back {
            background-color: #c8a87a;
            color: #5d4037;
            border: 2px solid #c8a87a;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #b89a6a;
            border-color: #b89a6a;
            transform: translateY(-2px);
        }

        .contract-detail-card {
            background-color: #f5f5f5;
            border: 2px solid #c8a87a;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(93, 64, 55, 0.1);
        }

        .contract-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #c8a87a;
        }

        .contract-title {
            color: #5d4037;
            font-size: 28px;
            font-weight: bold;
        }

        .contract-status-large {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .contract-status-large.cancelled {
            background-color: #f44336;
            color: white;
        }

        .contract-status-large.pending {
            background-color: #ff9800;
            color: white;
        }

        .contract-status-large.completed {
            background-color: #4caf50;
            color: white;
        }

        .contract-status-large.onRent {
            background-color: #2196f3;
            color: white;
        }

        .parties-section {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            gap: 40px;
            margin-bottom: 40px;
            padding: 25px;
            background: linear-gradient(135deg, #f9f7f2 0%, #f5f5f5 100%);
            border-radius: 12px;
            border: 1px solid #e8e8e8;
        }

        .party-card {
            text-align: center;
        }

        .party-role {
            color: #7d6b5a;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .party-name {
            color: #5d4037;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .party-details {
            text-align: left;
            margin-top: 15px;
        }

        .party-detail {
            margin-bottom: 8px;
            color: #5d4037;
        }

        .party-detail strong {
            color: #7d6b5a;
        }

        .contract-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c8a87a;
            font-size: 40px;
            font-weight: bold;
        }

        .department-section {
            margin-bottom: 40px;
            padding: 25px;
            background: white;
            border-radius: 12px;
            border: 1px solid #e8e8e8;
        }

        .section-title {
            color: #5d4037;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .department-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            color: #7d6b5a;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .info-value {
            color: #5d4037;
            font-size: 16px;
            padding: 8px 12px;
            background-color: #f9f9f9;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
        }

        .rent-terms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .term-card {
            padding: 20px;
            background: white;
            border-radius: 8px;
            border: 1px solid #e8e8e8;
            text-align: center;
        }

        .term-value {
            color: #5d4037;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .term-label {
            color: #7d6b5a;
            font-size: 14px;
            font-weight: 600;
        }

        .contract-timeline {
            margin: 40px 0;
            padding: 25px;
            background: white;
            border-radius: 12px;
            border: 1px solid #e8e8e8;
        }

        .timeline-info {
            margin-bottom: 20px;
        }

        .timeline-dates {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #7d6b5a;
            font-size: 14px;
        }

        .progress-container {
            height: 8px;
            background-color: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #c8a87a 0%, #5d4037 100%);
            border-radius: 4px;
        }

        .timeline-stats {
            text-align: center;
            color: #7d6b5a;
            font-size: 14px;
        }

        .notes-section {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #c8a87a;
        }

        .notes-content {
            color: #5d4037;
            font-size: 16px;
            line-height: 1.6;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #e8e8e8;
            min-height: 100px;
        }

        .no-notes {
            color: #9e9e9e;
            font-style: italic;
            text-align: center;
            padding: 40px;
        }

        .contract-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #7d6b5a;
            font-size: 14px;
        }
        
        .user-link {
            color: #5d4037;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
            padding-bottom: 2px;
        }

        .user-link:hover {
            color: #c8a87a;
            border-bottom-color: #c8a87a;
        }
    </style>

    <div class="contract-detail-container">
        <a href="{{ route('contracts.index') }}" class="btn-back">← Back to Contracts</a>

        <div class="contract-detail-card">
            <div class="contract-header">
                <h1 class="contract-title">Contract #{{ $rent->id }}</h1>
                <div class="contract-status-large {{ $rent->status }}">
                    {{ ucfirst($rent->status) }}
                </div>
            </div>

            <div class="parties-section">
                <div class="party-card">
                    <div class="party-role">Tenant</div>
                    <div class="party-name">
                        <a href="{{ route('users.show', $rent->user) }}" class="user-link">
                            {{ $rent->user->first_name }} {{ $rent->user->last_name }}
                        </a>
                    </div>
                    <div class="party-details">
                        <div class="party-detail">
                            <strong>Phone:</strong> {{ $rent->user->phone ?? 'N/A' }}
                        </div>
                    </div>
                </div>

                <div class="contract-arrow">→</div>

                <div class="party-card">
                    <div class="party-role">Owner</div>
                    <div class="party-name">
                        <a href="{{ route('users.show', $rent->department->user) }}" class="user-link">
                            {{ $rent->department->user->first_name }} {{ $rent->department->user->last_name }}
                        </a>
                    </div>
                    <div class="party-details">
                        <div class="party-detail">
                            <strong>Phone:</strong> {{ $rent->department->user->phone ?? 'N/A' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="department-section">
                <div class="section-title">Department Details</div>
                
                <div class="department-info-grid">
                    <div class="info-item">
                        <div class="info-label">Location</div>
                        <div class="info-value">
                            {{ $rent->department->location['street'] ?? 'N/A' }}, 
                            {{ $rent->department->location['district'] ?? 'N/A' }}, 
                            {{ $rent->department->location['city'] ?? 'N/A' }}
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Area</div>
                        <div class="info-value">{{ $rent->department->area }} m²</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Bedrooms</div>
                        <div class="info-value">{{ $rent->department->bedrooms }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Bathrooms</div>
                        <div class="info-value">{{ $rent->department->bathrooms }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Floor</div>
                        <div class="info-value">{{ $rent->department->floor }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Department Status</div>
                        <div class="info-value">{{ ucfirst($rent->department->status) }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Verification</div>
                        <div class="info-value">
                            <span>
                                @if($rent->department->verification_state === 'verified')
                                    Verified
                                @elseif($rent->department->verification_state === 'rejected')
                                    Rejected
                                @else
                                    Pending
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-label">Description</div>
                    <div class="info-value" style="min-height: 60px;">
                        {{ $rent->department->description }}
                    </div>
                </div>
            </div>

            <div class="section-title">Rental Terms</div>
            <div class="rent-terms-grid">
                <div class="term-card">
                    <div class="term-value">${{ number_format($rent->rentFee, 2) }}</div>
                    <div class="term-label">Monthly Rent</div>
                </div>
                
                <div class="term-card">
                    <div class="term-value">{{ $rent->startRent }}</div>
                    <div class="term-label">Start Date</div>
                </div>
                
                <div class="term-card">
                    <div class="term-value">{{ $rent->endRent }}</div>
                    <div class="term-label">End Date</div>
                </div>
                
                <div class="term-card">
                    @php
                        $daysRemaining = round($today->diffInDays($endDate, false));
                    @endphp
                    <div class="term-value {{ $daysRemaining < 0 ? 'expired' : ($daysRemaining < 30 ? 'warning' : 'normal') }}"
                         style="{{ $daysRemaining < 0 ? 'color: #f44336;' : ($daysRemaining < 30 ? 'color: #ff9800;' : 'color: #4caf50;') }}">
                        {{ $daysRemaining > 0 ? $daysRemaining : 'Expired' }}
                    </div>
                    <div class="term-label">Days Remaining</div>
                </div>
            </div>

            @if($rent->status === 'onRent' || $rent->status === 'pending')
                <div class="contract-timeline">
                    <div class="section-title">Contract Timeline</div>
                    
                    <div class="timeline-info">
                        @php
                            $totalDays = $startDate->diffInDays($endDate);
                            $daysPassed = round($startDate->diffInDays(min($today, $endDate)));
                            $progress = min(100, max(0, ($daysPassed / $totalDays) * 100));
                            
                            $isFuture = $today < $startDate;
                            $isActive = $today >= $startDate && $today <= $endDate;
                            $isCompleted = $today > $endDate;
                        @endphp
                        
                        <div class="timeline-dates">
                            <span>Start: {{ $startDate->format('M d, Y') }}</span>
                            <span>Today: {{ $today->format('M d, Y') }}</span>
                            <span>End: {{ $endDate->format('M d, Y') }}</span>
                        </div>
                        
                        <div class="progress-container">
                            <div class="progress-bar" style="width: {{ $progress }}%;"></div>
                        </div>
                        
                        <div class="timeline-stats">
                            @if($isFuture)
                                <span style="color: #ff9800;">Starts in {{ $today->diffInDays($startDate) }} days</span>
                            @elseif($isActive)
                                <span style="color: #4caf50;">{{ number_format($progress, 1) }}% completed ({{ $daysPassed }}/{{ $totalDays }} days)</span>
                            @else
                                <span style="color: #9e9e9e;">Contract completed</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="contract-meta">
                <div>
                    <strong>Contract Created:</strong> {{ $rent->created_at->format('M d, Y H:i') }}
                </div>
                <div>
                    <strong>Last Updated:</strong> {{ $rent->updated_at->format('M d, Y H:i') }}
                </div>
            </div>
        </div>
    </div>
</x-layout>