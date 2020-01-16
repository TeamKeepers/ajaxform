<a href="www.keepizi.com"><img src="https://www.keepizi.com/wp-content/uploads/2018/08/Logo-Keepizi_violet_mobile.png" title="Keepizi" alt="Keepizi"></a>

***Exercise for students: Ajax + Git***

# AJAX FORM TO REGISTER NEW USERS
> Our form allow new users in two ways: AJax firstly, but if JS is disable, the info are going to be handled thanks to PHP

> Tech: Ajax, Javascript, PHP

**Don't forget to ...**
- include a "inc" folder
- create in that new folder a connection to your DTB thanks to a "$pdo" object in a "init.inc.php"

> How the page is working
![AJAX & PHP SIGNUP FORM](https://gph.is/g/EBOkxRB)

## Table of Contents

- [Database](#database)
- [Thanks](#thanks)

--- 
## Database
---

```SQL
-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(3) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `department` varchar(30) NOT NULL,
  `recruitment_date` date NOT NULL,
  `salary` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;
COMMIT;
```

--- 
## Thanks
---

To all the students !

[![PLEASE VISIT OUR WEBSITE](https://www.keepizi.com/wp-content/uploads/2018/12/undraw_digital_nomad_9kgl.png)](https://www.keepizi.com/)