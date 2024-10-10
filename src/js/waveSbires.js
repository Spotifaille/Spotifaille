// Dans le dossier /img tu as trois png, sbire_canon, sbire_mage et sbire_melee, tu dois les animer qui traversent l'écran de gauche à droite
// Une fois sur 3, la wave sera 3 melee, un canon, et 3 mages
// Le reste du temps, ce sont des waves avec 3 melee et 3 mages

let waveCount = 0;

function animateLeagueOfLegendsWave() {
    const waveContainerRed = document.getElementById('wave-container-red');
    const waveContainerBlue = document.getElementById('wave-container-blue');

    const minionsRed = ['rouge_sbire_melee', 'rouge_sbire_mage', 'rouge_sbire_canon'];
    const minionsBlue = ['bleu_sbire_melee', 'bleu_sbire_mage', 'bleu_sbire_canon'];
    const wavePattern = waveCount % 3 === 2 ? [0, 0, 0, 2, 1, 1, 1] : [0, 0, 0, 1, 1, 1];
    waveCount++;

    wavePattern.forEach((minionType, index) => {
        setTimeout(() => {
            // Red minions
            const minionRed = document.createElement('img');
            minionRed.src = `/img/${minionsRed[minionType]}.png`;
            minionRed.className = 'minion-red';
            minionRed.style.transform = `translateY(${index * 40}px)`; // Adjust spacing between minions vertically
            waveContainerRed.appendChild(minionRed);

            // Blue minions
            const minionBlue = document.createElement('img');
            minionBlue.src = `/img/${minionsBlue[minionType]}.png`;
            minionBlue.className = 'minion-blue';
            minionBlue.style.transform = `translateY(${index * 40}px)`; // Adjust spacing between minions vertically
            waveContainerBlue.appendChild(minionBlue);
        }, index * 500); // Delay each minion's appearance by 0.5 second
    });

    // Clear minions after animation ends and start a new wave
    setTimeout(() => {
        while (waveContainerRed.firstChild) {
            waveContainerRed.removeChild(waveContainerRed.firstChild);
        }
        while (waveContainerBlue.firstChild) {
            waveContainerBlue.removeChild(waveContainerBlue.firstChild);
        }
        animateLeagueOfLegendsWave(); // Start a new wave after the current one finishes
    }, 10000); // Adjust this duration based on your animation duration
}

document.addEventListener('DOMContentLoaded', () => {
    console.log("Minions have spawned!");
    animateLeagueOfLegendsWave(); // Start the first wave
});