# Gestion des Dépenses Mensuelles

## Contexte du projet
Cette application web permet aux utilisateurs de suivre leurs dépenses mensuelles, de contrôler leur budget et de visualiser facilement leurs habitudes de consommation.

---

## Fonctionnalités

### 1. Authentification & Utilisateurs
- **Création de compte** : En tant qu’utilisateur, je peux créer un compte.
- **Connexion / Déconnexion** : En tant qu’utilisateur, je peux me connecter et me déconnecter.
- **Profil utilisateur** : En tant qu’utilisateur, je peux consulter mon profil.
- **Sécurité** : Le système sécurise l’authentification avec des sessions et des mots de passe hashés.

---

### 2. Wallet & Budget
- **Wallet mensuel** : Chaque utilisateur possède un wallet pour suivre son budget mensuel.
- **Définition du budget** : En tant qu’utilisateur, je peux définir un budget mensuel.
- **Consultation des montants** :
  - Budget total  
  - Total des dépenses  
  - Solde restant
- **Calcul automatique** : Le système calcule automatiquement tous les montants.

---

### 3. Dépenses
- **Gestion des dépenses** :
  - Ajouter une dépense  
  - Supprimer une dépense  
  - Consulter la liste des dépenses
- **Validation** : Les montants négatifs sont bloqués.
- **Contenu d’une dépense** :
  - Titre  
  - Montant  
  - Date  
  - Catégorie (via `categories_id`)
- **Classement par catégorie** :
  - Nourriture  
  - Transport  
  - Loyer  
  - Loisirs  
  - Autre

---

### 4. Catégories
- Les catégories ne sont **pas codées en dur** et sont stockées dans la table `categories`.
- Chaque dépense est liée à une catégorie via son ID.
- Les catégories permettent d’organiser l’affichage et les statistiques.
- **Catégories par défaut** :
  - Nourriture  
  - Transport  
  - Loyer  
  - Loisirs  
  - Autre

---

### 5. Calculs & Statistiques simples
- En tant qu’utilisateur, je peux voir :
  - Total dépensé du mois  
  - Solde restant
- Les calculs sont centralisés via des **méthodes orientées objet (OOP)**.

---

### 6. Développement & OOP
- Utilisation :
  - **Classes**  
  - **Classe abstraite** pour les transactions  
  - **Interface** pour les calculs  
  - **Trait** pour le formatage des montants
- Séparation claire :
  - Logique métier  
  - Accès aux données  
  - Affichage
- Base de données : **PDO** avec requêtes préparées.
- Gestion des erreurs : via exceptions simples.

---

### 7. Fonctionnalité clé (BONUS) : Dépenses automatiques
- **Principe** : Une dépense automatique revient chaque mois, avec un montant fixe ou estimé, et est ajoutée automatiquement au wallet du mois courant.
- **Exemples** :
  - Loyer : 1500 MAD  
  - Électricité : 250 MAD  
  - Internet : 200 MAD  
  - Abonnement téléphone : 100 MAD
- **Règles métier** :
  - L’utilisateur peut créer une dépense automatique.
  - L’utilisateur peut activer ou désactiver une dépense automatique.
  - Les dépenses automatiques actives sont ajoutées **une seule fois par mois**.
  - Une dépense automatique apparaît dans la liste des dépenses comme une dépense normale (avec un label).