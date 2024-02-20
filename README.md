[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/aMYFqSAE)

# CGIS - Proyecto evaluación continua

# Gestión de comedor de hospital
## Integrantes
- Alfonso Ibáñez Rodríguez: [@alibauez](https://github.com/alibauez)
- Alberto García Mármol: [@albgarmar2502](https://github.com/albgarmar2502)


## Dominio

El sistema de gestión del comedor en un hospital es una herramienta indispensable para asegurar una atención integral y personalizada a los pacientes en cuanto a su alimentación y nutrición. Es importante garantizar que cada paciente reciba la cantidad adecuada de macronutrientes según sus necesidades dietéticas individuales, alergias, dolencias alimentarias y/o médicas.

El proceso de gestión del comedor involucra múltiples actividades, desde la planificación y preparación de menús hasta la distribución de las comidas y el seguimiento del cumplimiento de las dietas prescritas. Estas actividades son llevadas a cabo por diferentes profesionales y personal médico en el hospital.

Los principales desafíos que enfrenta el sistema de gestión del comedor incluyen la necesidad de optimizar la cantidad de alimentos necesarios para cada paciente, minimizar errores en la distribución de comidas, garantizar la seguridad alimentaria y cumplir con las restricciones dietéticas de los pacientes.

Además, el sistema debe ser capaz de adaptarse a las necesidades cambiantes de los pacientes, como dietas especiales para pacientes en recuperación de cirugías o procedimientos médicos, así como también permitir la inclusión de preferencias dietéticas religiosas y alergias alimentarias.

La aplicación propuesta tiene como objetivo abordar estos desafíos proporcionando una plataforma centralizada y fácil de usar e intuitiva para todo tipo de personas, que permita a los diferentes usuarios del sistema colaborar eficientemente en la gestión del comedor hospitalario. Al permitir la introducción de datos sobre alergias y dolencias alimentarias por parte del dietista, así como la elaboración de planes personalizados para cada paciente, el sistema garantizará una atención nutricional adecuada y segura para todos los pacientes.

## OBJETIVOS:
- Facilitar la gestión del comedor, y optimizar los platos específicos a necesitar para cada paciente y evitar errores 
- Permitir que el dietista pueda introducir en los datos del paciente sus alergías y/o dolencias alimentarias.
- Permitir que el sistema pueda elaborar un plan personalizado para cada paciente.


## Usuarios del sistema
- Administrador 
- Paciente
- Dietista

## Requisitos de información (El sistema debe....)
### Todos los usuarios:
- **RI1**: El sistema deberá almacenar la información de acceso los usuarios del sistema: correo electrónico y contraseña.
- **RI2**: Información de usuario: El sistema deberá almacenar una cierta información sobre cada usuario: nombre, edad, fecha de nacimiento, DNI. 

### Menú del día
- **RI3**: El sistema deberá almacenar información sobre los diferentes menús, como las instrucciones específicas.

### Plato
- **RI4**: El sistema deberá almacenar información sobre cada plato: tipo (primero, segundo o postre), nombre, alérgenos..


### Información nutricional
- **RI5**: El sistema deberá almacenar información nutricional sobre cada plato: grasas, carbohidratos, proteinas, sodio y contenido energético.

  
## Requisitos funcionales (Como ROL, quiero ver..... ) HAY QUE PONERLOS COMO EL RF6 
- **RF1**: Como usuario, quiero crear, editar y eliminar perfiles.
- **RF2**: El sistema debe poder diseñar planes de alimentación personalizados para cada paciente, basados en su estado de salud, alergias alimentarias y preferencias dietéticas.



POR AQUI VOY ---------------------------------------------



- **RF3**: El sistema debe permitir la definición y programación de menús teniendo en cuenta las necesidades dietéticas y preferencias de los pacientes.

- **RF5**: Los pacientes deben poder realizar solicitudes de alimentos especiales a través del sistema, indicando sus preferencias o restricciones dietéticas. 
- **RF6**: Como paciente, quiero ver un hist´rico de mis ingestas alimentarias.
- **RF7**: El sistema debe permitir la generación de informes sobre el consumo de alimentos, 
- **RF8**: Los usuarios deben poder gestionar sus perfiles dentro del sistema, incluyendo la actualización de información personal y la configuración de preferencias. 


## Requisitos No Funcionales 
- **RNF1**: La interfaz de usuario debe ser intuitiva y fácil de usar para facilitar la adopción por parte de los usuarios, independientemente de su nivel de habilidad técnica.
- **RNF2**: El sistema debe ser seguro y proteger la privacidad de la información del paciente, cumpliendo con los estándares de seguridad y regulaciones de protección de datos.
- **RNF3**: El sistema debe estar siempre disponible para garantizar un acceso continuo y sin interrupciones a las funciones del sistema durante todo el día.
- **RNF4**: El sistema debe ser escalable para manejar un gran volumen de datos y usuarios simultáneos.
- **RNF5**: Debe ser compatible con diferentes dispositivos y navegadores web para permitir el acceso desde múltiples plataformas y dispositivos.
- **RNF6**: El tiempo de respuesta del sistema debe ser rápido y eficiente, asegurando una experiencia de usuario fluida.
- **RNF7**: Debe ser fácilmente mantenible y actualizable para permitir la incorporación de nuevas funcionalidades y corrección de errores de manera oportuna.


## Reglas de Negocio
- **RN1**: Los pacientes deben proporcionar consentimiento explícito para el uso y procesamiento de su información personal y médica dentro del sistema.
- **RN2**: Los dietistas solo pueden acceder y modificar los planes de alimentación de los pacientes asignados a su cuidado.
- **RN3**: El personal del comedor debe seguir estrictamente las instrucciones y restricciones dietéticas establecidas en los planes de alimentación de los pacientes.
- **RN4**: Los registros de consumo de alimentos deben mantenerse actualizados y ser precisos para proporcionar una visión precisa del cumplimiento de las dietas prescritas.
- **RN5**: El personal del almacén debe garantizar que los alimentos almacenados cumplan con los estándares de calidad y seguridad alimentaria establecidos.
- **RN6**: Los registros de acceso y acciones realizadas dentro del sistema deben ser rastreables para garantizar la responsabilidad y transparencia en el uso del sistema.
- **RN7**: El sistema debe cumplir con todas las regulaciones y estándares relevantes en cuanto a seguridad alimentaria, protección de datos y atención médica.
 

## Modelado conceptual en UML

![Modelado conceptual en UML](images/UML.drawio.png)



## Manual de usuario con capturas. 
- NO ES PARA LA PRIMERA ENTREGA
