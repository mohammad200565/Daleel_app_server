@props(['department'])

<a href="/departments/{{$department->id}}" class="department-card-link">
    <div class="department-card">
        <!-- Department Image Placeholder -->
        <div class="department-image-placeholder">
            🏠
        </div>
        
        <div class="department-location">
            {{ $department->location['city'] ?? 'N/A' }}, {{ $department->location['district'] ?? 'N/A' }}
        </div>
        
        <!-- Updated Department Specs with Labels -->
        <div class="department-specs">
            <div class="spec-item">
                <span class="spec-value">{{ $department->area }}</span>
                <span class="spec-label">m²</span>
            </div>
            <div class="spec-item">
                <span class="spec-value">{{ $department->bedrooms }}</span>
                <span class="spec-label">Bed</span>
            </div>
            <div class="spec-item">
                <span class="spec-value">{{ $department->bathrooms }}</span>
                <span class="spec-label">Bath</span>
            </div>
            <div class="spec-item">
                <span class="spec-value">{{ $department->floor }}</span>
                <span class="spec-label">Floor</span>
            </div>
        </div>
        
        <div class="department-rent">
            ${{ number_format($department->rentFee) }}/month
        </div>
        
        <div class="department-status {{ $department->status }}">
            {{ ucfirst($department->status) }}
        </div>
        
        <!-- Verification Badge -->
        <div class="verification-badge 
            @if($department->verification_state === 'verified') verified
            @elseif($department->verification_state === 'rejected') rejected
            @else pending @endif">
            @if($department->verification_state === 'verified')
                Verified
            @elseif($department->verification_state === 'rejected')
                Rejected
            @else
                Pending
            @endif
        </div>
    </div>
</a>