import os

def contar_solicitudes_http_y_lineas(LOGISTICA):
    tipos_http = ['GET', 'POST', 'DELETE', 'PUT']
    solicitudes = {tipo: 0 for tipo in tipos_http}
    total_lineas = 0

    # Extensiones de archivos que quieres revisar
    extensiones_validas = ['.js', '.ts', '.py', '.java', '.cs']  # Añade más según lo que necesites

    for subdir, _, archivos in os.walk(LOGISTICA):
        for archivo in archivos:
            # Verificar si el archivo tiene una extensión válida
            extension = os.path.splitext(archivo)[1]
            if extension in extensiones_validas:
                ruta_archivo = os.path.join(subdir, archivo)
                print(f"Revisando archivo: {ruta_archivo}")
                
                try:
                    with open(ruta_archivo, 'r', encoding='utf-8') as f:
                        lineas = f.readlines()
                        total_lineas += len(lineas)
                        
                        # Verificar cada línea para encontrar solicitudes HTTP
                        for linea in lineas:
                            for tipo in tipos_http:
                                if tipo in linea:
                                    solicitudes[tipo] += 1
                except Exception as e:
                    print(f"Error al leer el archivo {ruta_archivo}: {e}")

