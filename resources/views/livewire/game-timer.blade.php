<div>
    <div class="grid gap-y-2 text-center" x-data="countTimer(100)" x-init="init()">
        <template x-if="getTime() <= 0">
        <form wire:submit="newCycle">
            <button type="submit">Click timer</button>
            <input type="hidden" wire:model="timer">
        </form>
        </template>
        <template x-if="getTime() > 0">
            <small>
                Timer:
                <span x-text="formatTime(getTime())"></span>
            </small>
        </template>
    </div>
    <script>
        function countTimer(num) {
            const milliseconds = num * 1000 //60 seconds
            const currentDate = Date.now() + milliseconds
            var countDownTime = new Date(currentDate).getTime()
            let interval;
            return {
                countDown: milliseconds,
                countDownTimer: new Date(currentDate).getTime(),
                intervalID: null,
                init() {
                    if (!this.intervalID) {
                        this.intervalID = setInterval(() => {
                        this.countDown = this.countDownTimer - new Date().getTime();
                        }, 1000);
                    }
                },
                getTime() {
                if (this.countDown < 0) {
                    this.clearTimer()
                }
                return this.countDown;
                },
                formatTime(num) {
                var date = new Date(num);
                return new Date(this.countDown).toLocaleTimeString(navigator.language, {
                    minute: '2-digit',
                    second: '2-digit'
                });
                },
                clearTimer() {
                clearInterval(this.intervalID);
                }
            }
        }
    </script>
</div>
