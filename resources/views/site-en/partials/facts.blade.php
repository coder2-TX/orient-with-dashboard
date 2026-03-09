<!-- ORIENT YEMEN - Facts & Numbers (EN) -->

@php
    use App\Models\HomeFact;

    $record = HomeFact::query()
        ->where('is_active', true)
        ->latest('id')
        ->first();

    // Default values
    $defaults = [
        'team'       => '80',
        'vehicles'   => '17',
        'warehouses' => '8',
        'pos'        => '8',
    ];

    $val = function (?string $raw, string $fallback) {
        $raw = trim((string) ($raw ?: $fallback));

        $hasPlus = str_contains($raw, '+');

        $target = (int) preg_replace('/\D+/', '', $raw);
        if ($target < 0) {
            $target = 0;
        }

        return [
            'prefix'  => $hasPlus ? '+' : '',
            'target'  => $target,
            'start'   => $hasPlus ? '+0' : '0',
            'display' => ($hasPlus ? '+' : '') . $target,
        ];
    };

    $team       = $val($record?->team_count,       $defaults['team']);
    $vehicles   = $val($record?->vehicles_count,   $defaults['vehicles']);
    $warehouses = $val($record?->warehouses_count, $defaults['warehouses']);
    $pos        = $val($record?->pos_count,        $defaults['pos']);
@endphp

<section class="oy-section oy-facts" id="facts">
    <div class="oy-section__inner">
        <h2 class="oy-section__title oy-reveal oy-delay-1">
            <span class="oy-section__title-icon" aria-hidden="true"></span>
            Our numbers speak for us
        </h2>

        <div class="oy-facts__grid" role="list">
            <article class="oy-fact oy-reveal oy-delay-1" role="listitem">
                <div class="oy-fact__icon" aria-hidden="true">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div
                    class="oy-fact__num"
                    data-counter
                    @if($team['prefix']) data-prefix="{{ $team['prefix'] }}" @endif
                    data-target="{{ $team['target'] }}"
                    data-start="{{ $team['start'] }}"
                >{{ $team['start'] }}</div>
                <div class="oy-fact__label">Skilled team members</div>
            </article>

            <article class="oy-fact oy-reveal oy-delay-2" role="listitem">
                <div class="oy-fact__icon" aria-hidden="true">
                    <i class="fa-solid fa-truck"></i>
                </div>
                <div
                    class="oy-fact__num"
                    data-counter
                    @if($vehicles['prefix']) data-prefix="{{ $vehicles['prefix'] }}" @endif
                    data-target="{{ $vehicles['target'] }}"
                    data-start="{{ $vehicles['start'] }}"
                >{{ $vehicles['start'] }}</div>
                <div class="oy-fact__label">Modern distribution vehicles</div>
            </article>

            <article class="oy-fact oy-reveal oy-delay-3" role="listitem">
                <div class="oy-fact__icon" aria-hidden="true">
                    <i class="fa-solid fa-warehouse"></i>
                </div>
                <div
                    class="oy-fact__num"
                    data-counter
                    @if($warehouses['prefix']) data-prefix="{{ $warehouses['prefix'] }}" @endif
                    data-target="{{ $warehouses['target'] }}"
                    data-start="{{ $warehouses['start'] }}"
                >{{ $warehouses['start'] }}</div>
                <div class="oy-fact__label">Central warehouses</div>
            </article>

            <article class="oy-fact oy-reveal oy-delay-4" role="listitem">
                <div class="oy-fact__icon" aria-hidden="true">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div
                    class="oy-fact__num"
                    data-counter
                    @if($pos['prefix']) data-prefix="{{ $pos['prefix'] }}" @endif
                    data-target="{{ $pos['target'] }}"
                    data-start="{{ $pos['start'] }}"
                >{{ $pos['start'] }}</div>
                <div class="oy-fact__label">Authorized points of sale</div>
            </article>
        </div>
    </div>
</section>