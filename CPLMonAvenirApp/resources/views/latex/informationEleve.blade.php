\documentclass[12pt,a4paper]{article}
\usepackage[utf8]{inputenc}
\usepackage{amsmath}
\usepackage{amsfonts}
\usepackage{amssymb}
\usepackage{makeidx}
\usepackage{graphicx}
\usepackage{lmodern}
\usepackage{longtable}
\usepackage[left=1cm,right=1cm,top=1cm,bottom=1cm]{geometry}


\begin{document}




\vspace{-2cm}
\begin{flushleft}
\begin{figure}[!h]
\includegraphics[scale=0.6]{@latex($logo)}
\end{figure}
\end{flushleft}


\vspace{-3.5cm}

\begin{flushright}
\huge
\textbf{Fiche d'information}\\
\small
\vspace{0cm}
COMPLEXE PRIVÉ LAÏQUE MON AVENIR\\
\end{flushright}

\vspace{0cm}

\begin{figure}[!h]
@if (file_exists(public_path('/storage/' . $eleve->profil)))
    \includegraphics[height=5.4cm]{@latex(public_path('/storage/' . $eleve->profil))}
@else
    \includegraphics[height=5.4cm]{@latex($photo_passeport)}
@endif
\end{figure}



\vspace{-5.9cm}
\hspace{5cm}
\renewcommand{\arraystretch}{1.3}
\begin{tabular}{|p{12.7cm}|}
\hline
\textbf{\large \underline{Informations générales}}\\
\textbf{Nom:} @latex($eleve->nom)\\
\textbf{Prénom:} @latex($eleve->prenom)\\
\textbf{Sexe:} @if ($eleve->sexe === 'M')
    Masculin
@else
    Féminin
@endif\\

@php
    $date = $eleve->date_naissance;

    // Création du timestamp à partir du date donnée
    $timestamp = strtotime($date);

    // Créer le nouveau format à partir du timestamp
    $date_naissance = date('d-m-Y', $timestamp);
@endphp

\textbf{Date de Naissance:} @latex($date_naissance)\\
\textbf{Lieu de Naissance:} @latex($eleve->lieu_naissance)\\
\textbf{Adresse:} @latex($eleve->adresse)\\
\textbf{Matricule:} @latex($eleve->matricule)\\
\hline
\end{tabular}


\vspace{0.5cm}
\renewcommand{\arraystretch}{1.5}
\hspace{-0.8cm}
\begin{tabular}{|p{7cm} p{11.2cm}|}
\hline
\textbf{\large \underline{Responsables légaux}} & \\

& \\

\textbf{\large Père} & \\
\textbf{Nom:} @latex(json_decode($eleve->pere)->nom) & \textbf{Prénom:} @latex(json_decode($eleve->pere)->prenom) \\
\textbf{Contact:} @latex(json_decode($eleve->pere)->telephone) & \textbf{Adresse:} @latex(json_decode($eleve->pere)->adresse)\\
\textbf{Profession:} @latex(json_decode($eleve->pere)->profession) & \textbf{Situation Matrimoniale:} @latex(json_decode($eleve->pere)->situation_matrimoniale)\\

& \\

\textbf{\large Mère} & \\
\textbf{Nom:} @latex(json_decode($eleve->mere)->nom) & \textbf{Prénom:} @latex(json_decode($eleve->mere)->prenom) \\
\textbf{Contact:} @latex(json_decode($eleve->mere)->telephone) & \textbf{Adresse:} @latex(json_decode($eleve->mere)->adresse)\\
\textbf{Profession:} @latex(json_decode($eleve->mere)->profession) & \textbf{Situation Matrimoniale:} @latex(json_decode($eleve->mere)->situation_matrimoniale)\\

& \\

\textbf{\large Tuteur/Tutrice} & \\
\textbf{Nom:} @latex(json_decode($eleve->contact_tuteur)->nom) & \textbf{Prénom:} @latex(json_decode($eleve->contact_tuteur)->prenom) \\
\textbf{Contact:} @latex(json_decode($eleve->contact_tuteur)->telephone) & \textbf{Adresse:} @latex(json_decode($eleve->contact_tuteur)->adresse)\\
\textbf{Profession:} @latex(json_decode($eleve->contact_tuteur)->profession) & \textbf{Situation Matrimoniale:} @latex(json_decode($eleve->contact_tuteur)->situation_matrimoniale)\\


\hline
\end{tabular}



\vspace{0.5cm}
\renewcommand{\arraystretch}{1.5}
\hspace{-0.8cm}
\begin{tabular}{|p{7cm} p{11.2cm}|}
\hline
\textbf{\large \underline{Informations sur la santé de l'élève}} & \\
\textbf{Groupe Sanguin:} @latex(json_decode($eleve->sante)->groupe) & \textbf{Problème de santé importants:} @latex(json_decode($eleve->sante)->problemes) \\
\textbf{Restrictions d'activités:} @latex(json_decode($eleve->sante)->restrictions) & \textbf{Médicaments pris régulièrement:} @latex(json_decode($eleve->sante)->medicaments) \\
\hline
\end{tabular}























\end{document}
