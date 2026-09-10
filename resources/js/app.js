// CFTP-MA Client Scripts (100% Vanilla JS, GPU-friendly, Zero dependencies)

document.addEventListener('DOMContentLoaded', function () {
    // 1. Menu Mobile Toggle
    var navToggle = document.getElementById('navToggle');
    var mobileMenu = document.getElementById('mobileMenu');
    if (navToggle && mobileMenu) {
        navToggle.addEventListener('click', function () {
            var open = mobileMenu.classList.toggle('is-open');
            navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    // 2. Adaptive Sticky Header on Scroll
    var header = document.querySelector('.site-header');
    if (header) {
        var onScroll = function () {
            if (window.scrollY > 20) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // 3. Scroll Reveal via IntersectionObserver
    if ('IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            rootMargin: '0px 0px -40px 0px',
            threshold: 0.1
        });

        document.querySelectorAll('.reveal').forEach(function (el) {
            revealObserver.observe(el);
        });
    } else {
        // Fallback for older browsers
        document.querySelectorAll('.reveal').forEach(function (el) {
            el.classList.add('is-revealed');
        });
    }

    // 4. Animated Stat Counters in Dark Section
    var statsGrid = document.querySelector('.stats-grid');
    if (statsGrid && 'IntersectionObserver' in window) {
        var hasAnimatedStats = false;
        var statsObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !hasAnimatedStats) {
                    hasAnimatedStats = true;
                    observer.unobserve(entry.target);

                    var statNums = entry.target.querySelectorAll('.stat .num');
                    statNums.forEach(function (numEl) {
                        var rawText = numEl.textContent.trim();
                        var hasPlus = rawText.indexOf('+') !== -1;
                        var target = parseInt(rawText.replace(/[^0-9]/g, ''), 10);
                        if (isNaN(target) || target <= 0) return;

                        var duration = 1400; // 1.4s
                        var startTimestamp = null;

                        var step = function (timestamp) {
                            if (!startTimestamp) startTimestamp = timestamp;
                            var progress = Math.min((timestamp - startTimestamp) / duration, 1);
                            // Ease-out cubic
                            var easeOut = 1 - Math.pow(1 - progress, 3);
                            var current = Math.floor(easeOut * target);
                            numEl.textContent = current + (hasPlus ? '+' : '');

                            if (progress < 1) {
                                window.requestAnimationFrame(step);
                            } else {
                                numEl.textContent = target + (hasPlus ? '+' : '');
                            }
                        };
                        window.requestAnimationFrame(step);
                    });
                }
            });
        }, { threshold: 0.25 });

        statsObserver.observe(statsGrid);
    }
});

