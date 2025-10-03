<div class="mt-2 alert alert-{{ $gameResult->is_win ? 'success' : 'danger' }}">
    <p>{{ __('Number: :number', ['number' => $gameResult->number]) }}</p>
    <p>{{ __('Result: :is_win', ['is_win' => $gameResult->is_win ? __('Win') : __('Lose')]) }}</p>
    <p>{{ __('Win Amount: :win_amount', ['win_amount' => $gameResult->win_amount]) }}</p>
</div>
