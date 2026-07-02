<!-- ORIENT YEMEN - Facts & Numbers (EN) -->

@php
    use App\Models\HomeFact;

    $record = HomeFact::query()
        ->where('is_active', true)
        ->latest('id')
        ->first();

    $team = HomeFact::normalizeCounter(
        $record?->team_count,
        HomeFact::DEFAULT_COUNTS['team_count'],
    );

    $vehicles = HomeFact::normalizeCounter(
        $record?->vehicles_count,
        HomeFact::DEFAULT_COUNTS['vehicles_count'],
    );

    $warehouses = HomeFact::normalizeCounter(
        $record?->warehouses_count,
        HomeFact::DEFAULT_COUNTS['warehouses_count'],
    );

    $pos = HomeFact::normalizeCounter(
        $record?->pos_count,
        HomeFact::DEFAULT_COUNTS['pos_count'],
    );
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
