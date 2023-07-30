const calculateArrow = function (canvasId, className) {
    const canvas = document.getElementById(canvasId);
    if (canvas) {
        const etapeArrowNumbers = document.getElementsByClassName(className);

        // Parcourir chaque étape arrow number
        for (let i = 0; i < etapeArrowNumbers.length - 1; i++) {
            const lineId = "line-" + canvasId + '-' + i + "-" + (i + 1);
            let line = document.getElementById(lineId);
            if (!line) {
                line = document.createElement("div");
                line.classList.add("line");
                line.id = lineId;
                // Ajouter la div "line" dans le parent de l'étape actuelle
                canvas.appendChild(line);
            }

            const point1 = etapeArrowNumbers[i];
            const point2 = etapeArrowNumbers[i + 1];

            const coord1 = { x: point1.offsetLeft, y: point1.offsetTop };
            const coord2 = { x: point2.offsetLeft, y: point2.offsetTop };

            // Get distance between the points for length of line
            const a = coord1.x - coord2.x;
            const b = coord1.y - coord2.y;
            var length = Math.sqrt(a * a + b * b);

            // Get angle between points
            var angleDeg = Math.atan2(coord2.y - coord1.y, coord2.x - coord1.x) * 180 / Math.PI;

            // Get distance from edge of point to center
            var pointWidth = point1.clientWidth / 2;
            var pointHeight = point1.clientWidth / 2;

            // Set line distance and position
            // Add width/height from above so the line starts in the middle instead of the top-left corner
            line.style.width = length + 'px';
            line.style.left = (coord1.x + pointWidth) + 'px';
            line.style.top = (coord1.y + pointHeight) + 'px';
            // Rotate line to match angle between points
            line.style.rotate = angleDeg + "deg";
        }
    }
}
const calculateLineDisplay = () => {
    calculateArrow("canvas", "etapes-arrow-number");
    if (document.getElementById('etape-details').classList.contains('show')) {
        calculateArrow('container-arrow', "modal-etapes-arrow-number");
    }
};

addEventListener("load", calculateLineDisplay);
addEventListener("resize", calculateLineDisplay);
const calculateLineDialog = (e) => {
    if (document.getElementById('etape-details').classList.contains('show')) {
        calculateArrow('container-arrow', "modal-etapes-arrow-number");
    } else {
        setTimeout(() => {
            calculateLineDialog(e);
        }, 10)
    }
}
const modalDetails = document.getElementById('etape-details');
modalDetails.addEventListener('show.bs.modal', calculateLineDialog)