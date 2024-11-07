<?php

class ValidadorPregunta {

    // Lista fusionada de palabras clave relacionadas con la seguridad laboral
    protected $palabrasClave = [
        'seguridad', 'trabajo', 'protección personal', 'equipo de protección', 
        'accidentes', 'emergencia', 'incendio', 'evacuación', 
        'riesgos', 'salud ocupacional', 'ergonomía', 'procedimientos',
        'primeros auxilios', 'prevención', 'inspección', 'incidente',
        'salud y seguridad', 'normas de seguridad', 'entrenamiento', 
        'protocolos de seguridad', 'higiene', 'peligros', 'protección respiratoria',
        'calzado de seguridad', 'guantes de protección', 'señalización de seguridad',
        'extintores', 'evacuación de emergencia', 'equipos de seguridad', 'auditoría de seguridad',
        'residuos peligrosos', 'control de riesgos', 'ventilación', 
        'iluminación adecuada', 'seguridad industrial', 'evaluación de riesgos',
        'análisis de riesgos', 'plan de seguridad', 'condiciones de trabajo',
        'gestión de seguridad', 'incendios y emergencias', 'seguridad eléctrica',
        'accidentes laborales', 'normativas', 'control de incendios', 'plan de emergencia',
        'capacitaciones de seguridad', 'materiales peligrosos', 'uso de maquinaria',
        'carga y descarga de materiales', 'protección auditiva', 'cascos de seguridad',
        'protectores visuales', 'mascarillas', 'líquidos inflamables', 'manejo de químicos',
        'espacios confinados', 'supervisión de seguridad', 'controles de ingeniería',
        'protección contra caídas', 'andamios', 'equipos de altura', 'trabajos en altura',
        'seguridad estructural', 'seguridad química', 'equipos contra incendios',
        'señalización de evacuación', 'ruta de escape', 'puntos de reunión',
        'desfibrilador automático', 'primeros respondedores', 'procedimientos de rescate',
        'equipos de rescate', 'normas de OSHA', 'gestión de residuos', 'prevención de lesiones',
        'seguridad de maquinaria', 'distanciamiento', 'aislamiento de maquinaria',
        'trabajo en espacios confinados', 'peligros eléctricos', 'líneas de vida',
        'controles administrativos', 'seguridad de grúas', 'operaciones seguras', 
        'barreras de protección', 'verificación de equipos', 'descontaminación', 
        'limpieza y desinfección', 'equipo de respuesta a emergencias', 
        'protocolos de cuarentena', 'monitoreo de gases', 'ventilación en áreas cerradas',
        'conformidad de seguridad', 'auditorías internas', 'reporte de accidentes',
        'formación en seguridad', 'evaluación ergonómica', 'riesgo biológico',
        'exposición a sustancias', 'temperaturas extremas', 'fatiga laboral',
        'seguridad física', 'inspección de equipos', 'prueba de seguridad',
        'monitoreo de salud', 'vigilancia de la salud', 'riesgo psicosocial',
        'bienestar laboral', 'detección de humo', 'detectores de gas',
        'alertas de seguridad', 'simulacros de evacuación', 'resiliencia organizacional',
        'entorno seguro', 'equipamiento de seguridad', 'control de acceso',
        'protección frente a caídas', 'bloqueo y etiquetado', 'separadores de seguridad'
    ];
    
    function ∑($pregunta) {
    // Convierte la pregunta a minúsculas para una comparación más precisa
        $pregunta = strtolower($pregunta);

        // Verifica si alguna palabra clave está en la pregunta
        foreach ($this->palabrasClave as $palabra) {
            if (strpos($pregunta, $palabra) !== false) {
                return true; // Es una pregunta válida relacionada con seguridad
            }
        }

        return false; // No es una pregunta válida de seguridad en el trabajo
    }
}
?>