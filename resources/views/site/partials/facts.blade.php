<!-- partials/facts.html -->
<!-- ORIENT YEMEN - Facts & Numbers -->

@php
  use App\Models\HomeFact;

  $record = HomeFact::query()
      ->where('is_active', true)
      ->latest('id')
      ->first();

  // افتراضي (لو ما فيه بيانات)
  $defaults = [
    'team'       => '80+',
    'vehicles'   => '17+',
    'warehouses' => '8',
    'pos'        => '8',
  ];

  $val = function (?string $raw, string $fallback) {
      $raw = trim((string) ($raw ?: $fallback));

      // هل فيه + ؟ (في البداية أو النهاية)
      $hasPlus = str_contains($raw, '+');

      // الرقم الفعلي للـ counter
      $target = (int) preg_replace('/\D+/', '', $raw);
      if ($target < 0) $target = 0;

      return [
          'prefix' => $hasPlus ? '+' : '',
          'target' => $target,
          'start'  => $hasPlus ? '+0' : '0',
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
      لغة الأرقام تتحدث عنا
    </h2>

    <div class="oy-facts__grid" role="list">
      <article class="oy-fact oy-reveal oy-delay-1" role="listitem">
        <div class="oy-fact__icon" aria-hidden="true">
          <i class="fa-solid fa-users"></i>
        </div>
        <div class="oy-fact__num"
             data-counter
             @if($team['prefix']) data-prefix="{{ $team['prefix'] }}" @endif
             data-target="{{ $team['target'] }}">{{ $team['start'] }}</div>
        <div class="oy-fact__label">كادر بشري متخصص</div>
      </article>

      <article class="oy-fact oy-reveal oy-delay-2" role="listitem">
        <div class="oy-fact__icon" aria-hidden="true">
          <i class="fa-solid fa-truck"></i>
        </div>
        <div class="oy-fact__num"
             data-counter
             @if($vehicles['prefix']) data-prefix="{{ $vehicles['prefix'] }}" @endif
             data-target="{{ $vehicles['target'] }}">{{ $vehicles['start'] }}</div>
        <div class="oy-fact__label">مركبة توزيع حديثة</div>
      </article>

      <article class="oy-fact oy-reveal oy-delay-3" role="listitem">
        <div class="oy-fact__icon" aria-hidden="true">
          <i class="fa-solid fa-warehouse"></i>
        </div>
        <div class="oy-fact__num"
             data-counter
             @if($warehouses['prefix']) data-prefix="{{ $warehouses['prefix'] }}" @endif
             data-target="{{ $warehouses['target'] }}">{{ $warehouses['start'] }}</div>
        <div class="oy-fact__label">مستودعات مركزية</div>
      </article>

      <article class="oy-fact oy-reveal oy-delay-4" role="listitem">
        <div class="oy-fact__icon" aria-hidden="true">
          <i class="fa-solid fa-store"></i>
        </div>
        <div class="oy-fact__num"
             data-counter
             @if($pos['prefix']) data-prefix="{{ $pos['prefix'] }}" @endif
             data-target="{{ $pos['target'] }}">{{ $pos['start'] }}</div>
        <div class="oy-fact__label">نقاط بيع معتمدة</div>
      </article>
    </div>
  </div>
</section>
