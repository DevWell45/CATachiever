document.querySelectorAll('.otp-input').forEach((input, idx, inputs) => {
    input.addEventListener('input', () => {
        input.value = input.value.replace(/\D/g, '').slice(0, 1);
        if (input.value && idx < inputs.length - 1) inputs[idx + 1].focus();
    });
    input.addEventListener('keydown', e => {
        if (e.key === 'Backspace' && !input.value && idx > 0) inputs[idx - 1].focus();
    });
    input.addEventListener('paste', e => {
        e.preventDefault();
        const digits = (e.clipboardData.getData('text').match(/\d/g) || []);
        digits.forEach((d, i) => { if (inputs[idx + i]) inputs[idx + i].value = d; });
        const next = inputs[Math.min(idx + digits.length, inputs.length - 1)];
        next && next.focus();
    });
});