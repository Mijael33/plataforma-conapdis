@extends('layouts.publica')

@section('titulo', 'Misión')

@section('contenido')

<section class="pagina-institucional py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="pagina-titulo mb-4">Misión</h1>
                <div class="contenido-institucional">
                    <p class="texto-institucional">
                        Nuestra Misión es diseñar e impulsar planes y programas sociales dirigidos a mejorar la calidad de vida de las personas con discapacidad en todo el territorio nacional, promoviendo la atención integral, prevención de la discapacidad, inclusión participativa y protagónica de las personas y sus familiares para la integración en los sistemas políticos, sociales y económicos del estado venezolano.
                    </p>
                    
                    {{-- ¿Qué es la discapacidad? --}}
                    <h3 class="mt-5 mb-3" style="color: #1a3b5d; font-weight: 700;">¿Qué es la discapacidad?</h3>
                    <p class="texto-institucional">
                        Se entiende por discapacidad la condición compleja del ser humano constituida por factores biopsicosociales, que evidencia una disminución o supresión temporal o permanente, de alguna de sus capacidades sensoriales, motrices o intelectuales que puede manifestarse en ausencias, anomalías, defectos, pérdidas o dificultades para percibir, desplazarse sin apoyo, ver u oír, comunicarse con otros, o integrarse a las actividades de educación o trabajo, en la familia con la comunidad, que limitan el ejercicio de derechos, la participación social y el disfrute de una buena calidad de vida, o impiden la participación activa de las personas en las actividades de la vida familiar y social, sin que ello implique necesariamente incapacidad o inhabilidad para insertarse socialmente.
                    </p>
                    
                    {{-- Objetivo --}}
                    <h3 class="mt-5 mb-3" style="color: #1a3b5d; font-weight: 700;">Objetivo</h3>
                    <p class="texto-institucional">
                        Participar en el diseño, desarrollo e implementación de políticas, que permitan la atención integral de las personas con discapacidad, la prevención de las discapacidades y en la promoción de cambios culturales en relación a la discapacidad dentro del territorio de la Republica Bolivariana de Venezuela, con base en lo establecido en la La Ley Orgánica para la Inclusión, Igualdad y Desarrollo Integral de las Personas con Discapacidad.
                    </p>
                    
                    {{-- Función --}}
                    <h3 class="mt-5 mb-3" style="color: #1a3b5d; font-weight: 700;">Función</h3>
                    <p class="texto-institucional">
                        Participar en la formulación de políticas, lineamientos, planes, proyectos y estrategias en materia de atención integral a las personas con discapacidad y someterlo a consideración del ministerio con competencia en materia de desarrollo social. Conocer sobre situaciones de discriminación a las personas con discapacidad y tramitarlas ante las autoridades competentes.
                    </p>
                    
                    {{-- Frase --}}
                    <blockquote class="mt-4 p-4" style="background-color: #f8fafc; border-left: 4px solid #003097; border-radius: 0 8px 8px 0;">
                        <p class="mb-0 fst-italic" style="font-size: 1.05rem; color: #1a3b5d;">
                            "Las personas con discapacidad son las estrellas y luceros de la patria, no debe quedar una sola persona que tenga algún tipo de discapacidad que no sea atendida"<br>
                            <strong>— Hugo Chávez Frías, 4 nov 2013</strong>
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection