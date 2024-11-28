 // Descargar como PDF
 document.getElementById('downloadPdf').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const content = document.getElementById('content').innerText;
    doc.text(content, 10, 10);
    doc.save('documento.pdf');
});

// Descargar como Word
document.getElementById('downloadWord').addEventListener('click', function () {
    const content = document.getElementById('content').innerHTML;
    const converted = htmlDocx.asBlob(content);
    const a = document.createElement('a');
    a.href = URL.createObjectURL(converted);
    a.download = 'documento.docx';
    a.click();
});

// Descargar como Excel
document.getElementById('downloadExcel').addEventListener('click', function () {
    const ws_data = [
        ["Título", "Contenido"],
        ["Documento de Ejemplo", "Este es un documento de ejemplo que puede ser descargado en diferentes formatos."]
    ]; 
    const ws = XLSX.utils.aoa_to_sheet(ws_data);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Hoja1");
    XLSX.writeFile(wb, 'documento.xlsx');
});