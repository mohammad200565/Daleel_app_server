@props(['department'])

<a href="/departments/{{$department->id}}" class="department-card-link">

    <style>
        .department-card-link {
            text-decoration: none;
            display: block;
            height: 100%;
        }
        .department-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: var(--shadow-card);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }
        .department-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
            border-color: var(--gold);
        }
        .dept-image-wrapper {
            position: relative;
            width: 100%;
            padding-top: 66%;
            overflow: hidden;
            background-color: var(--bg-body);
        }
        .dept-actual-image {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .department-card:hover .dept-actual-image {
            transform: scale(1.1);
        }
        .dept-fallback-modern {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, var(--bg-body), var(--border-color));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-sub);
        }
        .dept-fallback-icon { width: 40px; opacity: 0.3; margin-bottom: 8px; }
        .badge-overlay {
            position: absolute;
            top: 16px; left: 16px;
            z-index: 2;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .badge-verified { background: rgba(232, 245, 233, 0.9); color: #2e7d32; }
        .badge-pending  { background: rgba(255, 248, 225, 0.9); color: #f57f17; }
        .badge-rejected { background: rgba(255, 235, 238, 0.9); color: #c62828; }
        
        :root.dark .badge-verified { background: rgba(46, 125, 50, 0.8); color: #fff; }
        :root.dark .badge-pending  { background: rgba(245, 127, 23, 0.8); color: #fff; }
        :root.dark .badge-rejected { background: rgba(198, 40, 40, 0.8); color: #fff; }

        .dept-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .dept-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .dept-price {
            font-size: 22px;
            font-weight: 800;
            color: var(--gold);
            letter-spacing: -0.5px;
        }
        .dept-price .period {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-sub);
        }
        .status-dot-label {
            display: flex; align-items: center; gap: 6px;
            font-size: 11px; font-weight: 700; text-transform: uppercase;
        }
        .dot-available { width: 8px; height: 8px; background: #2e7d32; border-radius: 50%; }
        .text-available { color: #2e7d32; }
        
        .dot-rented { width: 8px; height: 8px; background: #c62828; border-radius: 50%; }
        .text-rented { color: #c62828; }
        :root.dark .text-available { color: #81c784; }
        :root.dark .text-rented { color: #ef9a9a; }
        .dept-location {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-main);
            margin: 0 0 4px 0;
            line-height: 1.4;
        }
        .dept-district {
            font-size: 13px;
            color: var(--text-sub);
            font-weight: 500;
            margin-bottom: 16px; 
            display: block;
        }
        .dept-description {
            font-size: 13px;
            color: var(--text-sub);
            margin-bottom: 20px;
            line-height: 1.5;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .dept-divider {
            height: 1px;
            background: var(--border-color);
            margin-bottom: 16px;
            width: 100%;
        }
        .dept-specs-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: auto;
        }
        .spec-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }
        .spec-icon {
            width: 22px; height: 22px;
            color: var(--text-sub);
            opacity: 0.7;
        }
        .spec-val {
            font-weight: 700;
            font-size: 13px;
            color: var(--text-main);
        }
        
        .spec-label {
            font-size: 10px;
            color: var(--text-sub);
            text-transform: uppercase;
            font-weight: 600;
        }
    </style>

    <div class="department-card">
        
        <div class="dept-image-wrapper">
            
            <div class="badge-overlay badge-{{ $department->verification_state }}">
                {{ ucfirst($department->verification_state) }}
            </div>

            @if($department->images->isNotEmpty())
                <img src="{{ Storage::url($department->images->first()->path) }}" 
                     alt="Department in {{ $department->location['city'] ?? 'city' }}" 
                     class="dept-actual-image">
            @else
                <div class="dept-fallback-modern">
                    <svg class="dept-fallback-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8h5z"></path></svg>
                    <span>No Image</span>
                </div>
            @endif
        </div>

        <div class="dept-body">
            
            <div class="dept-header-row">
                <div class="dept-price">
                    ${{ number_format($department->rent_fee ?? $department->rentFee) }}
                    <span class="period">/day</span>
                </div>
                
                <div class="status-dot-label">
                    <span class="dot-{{ strtolower($department->status) === 'available' ? 'available' : 'rented' }}"></span>
                    <span class="text-{{ strtolower($department->status) === 'available' ? 'available' : 'rented' }}">
                        {{ ucfirst($department->status) }}
                    </span>
                </div>
            </div>

            <div class="dept-location">
                {{ $department->location['governorate'] ?? 'Unknown City' }}
            </div>

            <span class="dept-district">
                {{ $department->location['district'] ?? 'District' }}
            </span>
            
            <p class="dept-description" title="{{ $department->headDescription }}">
                {{ Illuminate\Support\Str::limit($department->headDescription, 80) }}
            </p>

            <div class="dept-divider"></div>

            <div class="dept-specs-grid">
                <div class="spec-box" title="Area">
                    <svg class="spec-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                    </svg>
                    <span class="spec-val">{{ $department->area }}</span>
                    <span class="spec-label">m²</span>
                </div>

                <div class="spec-box" title="Bedrooms">
                    <svg class="spec-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span class="spec-val">{{ $department->bedrooms }}</span>
                    <span class="spec-label">Bed</span>
                </div>

                <div class="spec-box" title="Bathrooms">
                    <svg class="spec-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12H4a2 2 0 00-2 2v4a2 2 0 002 2h16a2 2 0 002-2v-4a2 2 0 00-2-2h-8zm0 0V8a4 4 0 118 0v4h-8z" />
                    </svg>
                    <span class="spec-val">{{ $department->bathrooms }}</span>
                    <span class="spec-label">Bath</span>
                </div>

                <div class="spec-box" title="Floor">
                    <svg class="spec-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-3a1 1 0 011-1h2a1 1 0 011 1v3m-5 0h6" />
                    </svg>
                    <span class="spec-val">{{ $department->floor }}</span>
                    <span class="spec-label">Floor</span>
                </div>
            </div>
        </div>
    </div>
</a>
