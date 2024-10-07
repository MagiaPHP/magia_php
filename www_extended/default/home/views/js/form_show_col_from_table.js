
document.addEventListener('DOMContentLoaded', function () {
    const columnList = document.getElementById('column-list');
    const selectColumn = document.getElementById('predefined-columns');
    let draggingItem;
    columnList.addEventListener('dragstart', function (e) {
        draggingItem = e.target;
        e.target.classList.add('dragging');
    });
    columnList.addEventListener('dragend', function (e) {
        e.target.classList.remove('dragging');
        draggingItem = null;
    });
    columnList.addEventListener('dragover', function (e) {
        e.preventDefault();
        const afterElement = getDragAfterElement(columnList, e.clientY);
        if (afterElement == null) {
            columnList.appendChild(draggingItem);
        } else {
            columnList.insertBefore(draggingItem, afterElement);
        }
    });
    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('li:not(.dragging)')];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return {offset: offset, element: child};
            } else {
                return closest;
            }
        }, {offset: Number.NEGATIVE_INFINITY}).element;
    }

    document.getElementById('columns-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevenir el envío del formulario
        const selectedColumns = [];
        document.querySelectorAll('#column-list li').forEach(function (li, index) {
            const columnData = {
                col_name: li.querySelector('input[name^="columns["][name$="[col_name]"]').value,
                label: li.querySelector('input[name^="columns["][name$="[label]"]').value,
                show: li.querySelector('input[name^="columns["][name$="[show]"]').checked,
                position: index // Actualizamos la posición de acuerdo con el índice actual
            };
            selectedColumns.push(columnData);
        });
        document.getElementById('selected-columns').value = JSON.stringify(selectedColumns);
        e.target.submit(); // Enviar el formulario
    });
    // Manejar la adición de columnas a partir del select
    document.getElementById('add-column-btn').addEventListener('click', function () {
        const selectedValue = selectColumn.value;
        const selectedText = selectColumn.options[selectColumn.selectedIndex].text;
        if (!selectedValue)
            return; // Si no hay selección, salir

        const newIndex = columnList.children.length;
        const newColumn = document.createElement('li');
        newColumn.setAttribute('draggable', 'true');
        newColumn.dataset.index = newIndex;
        newColumn.innerHTML = `
                <input type="hidden" name="columns[${newIndex}][col_name]" value="${selectedValue}">
                <input type="checkbox" name="columns[${newIndex}][show]" value="1" checked>
                <input type="hidden" name="columns[${newIndex}][label]" value="${selectedText}">
                <input type="hidden" name="columns[${newIndex}][position]" value="${newIndex}">
                ${selectedText}
                <button type="button" class="btn btn-danger btn-sm remove-column">Eliminar</button>
            `;
        columnList.appendChild(newColumn);
    });
    // Manejar la eliminación de columnas
    columnList.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-column')) {
            const li = e.target.closest('li');
            if (li) {
                li.remove();
            }
        }
    });
});
