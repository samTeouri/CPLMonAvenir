\documentclass[11pt,a4paper]{article}
\usepackage[utf8]{inputenc}
\usepackage{amsmath}
\usepackage{amsfonts}
\usepackage{amssymb}
\usepackage{makeidx}
\usepackage{graphicx}
\usepackage{lmodern}
\usepackage[table]{xcolor}
\usepackage{fmtcount}
\usepackage{tcolorbox}
\usepackage{fancybox}
\usepackage{color}
\usepackage[autolanguage,np]{numprint}
\usepackage{fancyhdr}
\usepackage{graphicx}
\usepackage{eso-pic}
\usepackage{ulem}
\usepackage[french]{babel}
\usepackage[left=1cm,right=1cm,top=1cm,bottom=1cm]{geometry}


\begin{document}

\begin{flushleft}
\large
\textsc{Ministère des Enseignements Primaire et Secondaire\\}
\hspace{2cm}\textsc{Technique et de l'Artisanat}\\
\vspace{0.3cm}
\Large
\textsf{\textbf{COMPLEXE SCOLAIRE}}\\
\textsf{\textbf{MON AVENIR}}\\



\normalsize
Travail - Discipline - Succès\\
BP:68 \textit{\textsf{SOKODE - TOGO}}\\
\vspace{0.5cm}
\large

@php
    $indice_trimestre = substr($trimestre->intitule, 10, 1);
    $prefixe = 'eme';
    if ($indice_trimestre === '1') {
        $prefixe === 'er';
    }
@endphp

\textbf{\textsc{BULLETIN DE NOTES DU }} \huge$@latex(substr($trimestre->intitule, 10, 1))^{@latex($prefixe)}$ \large\textbf{\textsc{TRIMESTRE}}

\end{flushleft}

\begin{flushright}
\vspace{-5.4cm}
\textsc{REPUBLIQUE TOGOLAISE}\\
\end{flushright}

\small
\vspace{-0.3cm}
\hspace{13.7cm}\textsc{Travail-Liberté-Patrie}

\begin{flushright}
\large
Année Scolaire: @latex($trimestre->promotion->anneeScolaire->annee)\\
\vspace{0.3cm}
\begin{tabular}{|c|c|}
\hline
Classe & Effectif \\
\hline
@latex(substr($classe->nom, 0, 6)) & @latex(count($classe->eleves)) \\
\hline
\end{tabular}
\begin{tabular}{|c|c|}
\hline
N & D \\
\hline
\textbf{X} & \\
\hline
\end{tabular}
\end{flushright}


\begin{figure}[!h]
\vspace{-2.3cm}
\hspace{8.7cm}
\includegraphics[scale=0.3]{@latex($logo)}
\end{figure}

\vspace{2cm}
\begin{center}

\large Nom et prénoms: \Large \textbf{@latex($eleve->nom) @latex($eleve->prenom)} \large Sexe: \textbf{\Large
@latex($eleve->sexe)} \large Date naissance: \Large \textbf{@latex($eleve->date_naissance)}
\end{center}

\begin{center}


\vspace{0.5cm}
\hspace{-0.5cm}
\renewcommand{\arraystretch}{2.2}
\begin{tabular}{|l||p{1cm}|p{1cm}|p{1.5cm}|c|p{1.5cm}|p{2.5cm}|c|}
\hline
\Large \textbf{MATIERES} & \multicolumn{2}{c|}{Notes} & \centering Moy. des 2 notes & Coef & \centering Notes
définitives &
\centering Appréciation des professeurs & Noms et signatures \\
\cline{2-3}
& Class & Compo & & & & & \ \\
\hline
@php
    $total = 0;
    $total_coefficient = 0;
@endphp
@foreach ($lignes as $ligne)
    @php
        $moyenne_2_notes = round(($ligne['notes_cours']['moyenne_classe'] + $ligne['notes_cours']['compo']) / 2, 2);
        $coefficient = $ligne['notes_cours']['cours']->coefficient;
        $note_def = round($moyenne_2_notes * $coefficient, 2);
        $professeur = $ligne['notes_cours']['cours']->professeur->nom . ' ' . $ligne['notes_cours']['cours']->professeur->prenom;
        $appreciation = 'Néant';
        if ($moyenne_2_notes <= 5.0) {
            $appreciation = 'Faible';
        } elseif (5.0 < $moyenne_2_notes && $moyenne_2_notes < 10.0) {
            $appreciation = 'Insuffisant';
        } elseif (10.0 <= $moyenne_2_notes && $moyenne_2_notes < 12.0) {
            $appreciation = 'Passable';
        } elseif (12.0 <= $moyenne_2_notes && $moyenne_2_notes < 14.0) {
            $appreciation = 'Assez Bien';
        } elseif (14.0 <= $moyenne_2_notes && $moyenne_2_notes < 16.0) {
            $appreciation = 'Bien';
        } elseif (16.0 <= $moyenne_2_notes && $moyenne_2_notes < 18.0) {
            $appreciation = 'Très Bien';
        } elseif (18.0 <= $moyenne_2_notes && $moyenne_2_notes <= 20.0) {
            $appreciation = 'Excellent';
        }
    @endphp
    \large \textsf{@latex($ligne['notes_cours']['cours']->matiere->intitule)} & \large \centering \textsf{@latex($ligne['notes_cours']['moyenne_classe'])} & \large \centering
    \textsf{@latex($ligne['notes_cours']['compo'])} &
    \centering \large \textsf{@latex($moyenne_2_notes)} & \large \textsf{@latex($coefficient)}
    & \centering \large \textsf{@latex($note_def)} & \centering \large \textsf{@latex($appreciation)} & \large
    \textsf{@latex($professeur)}
    \\
    \hline
    @php
        $total += $note_def;
        $total_coefficient += $coefficient;
    @endphp
@endforeach
\multicolumn{3}{|c|}{\textsc{\textbf{TOTAUX}}} & & @latex($total_coefficient) & @latex($total) \\
\cline{1-6}
\end{tabular}

\end{center}


\begin{flushleft}
\hspace{0.05cm}
\renewcommand{\arraystretch}{1.2}
\begin{tabular}{|p{9.5cm}|p{8.1cm}|}
\hline
Moyenne en lettre: \textbf{\textit{\large @latex($moyenne_lettre)}} & Moyenne du $1^{er}$ trimestre:
\textbf{\large @latex($moyennes_trimestres[$trimestre->id]['moyenne'])}. Rang: \large\textbf{@latex($moyennes_trimestres[$trimestre->id]['rang'])} sur \large @latex(count($classe->eleves))\\

Tableau d'honneur: Non & Moyenne du $2^{eme}$ trimestre: \textbf{\large @latex($moyennes_trimestres[$trimestre->id + 1]['moyenne'])}. Rang:
\large\textbf{@latex($moyennes_trimestres[$trimestre->id + 1]['rang'])} sur \large @latex(count($classe->eleves))\\

Encouragements: Non & Moyenne du $3^{eme}$ trimestre: \textbf{\large @latex($moyennes_trimestres[$trimestre->id + 2]['moyenne'])}. Rang:
\large\textbf{@latex($moyennes_trimestres[$trimestre->id + 2]['rang'])} sur \large @latex(count($classe->eleves))\\

Félicitations: Non & Moyenne Annuelle: \textbf{\large @latex($moyenne_annuelle)}. \\

Retards: @latex(count($assiduite->retards)) & Décisions du conseil des professeurs: \\

Absences: @latex(count($assiduite->absences)) & \\
@php
    $heures_absences = 0;
    foreach ($assiduite->absences as $absence) {
        $heures_absences += $absence->nombre_heure;
    }
@endphp
Absences évaluées en heures: @latex($heures_absences)h & \\
@php
    $comportement = json_decode($assiduite->comportement);
    $avertissement = $comportement->avertissement;
    $blame = $comportement->blame;
@endphp
Avertissement: @if ($avertissement->Travail === true) Travail @endif @if ($avertissement->Discipline === true) Discipline @endif & \\
Blâme pour: @if ($blame->Travail === true) Travail @endif @if ($blame->Discipline === true) Discipline @endif & \\
\hline
Nom et signature du titulaire: @if($classe->professeur) @latex($classe->professeur->nom) @latex($classe->professeur->prenom) @endif & Sokodé, le \large \today\\
& \textbf{Le Directeur} \\
& \\
& \\
& \\
\hline
\end{tabular}

\end{flushleft}














\end{document}
