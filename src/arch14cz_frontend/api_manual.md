## Arch14CZ - API
The Arch14CZ database can be accessed via an API in XML format. Different types of data are queried using the following verbs:
### ListMetadata
Query: [https://www.arch14.cz/?verb=ListMetadata](https://www.arch14.cz/?verb=ListMetadata)

Retrieves metadata about the database, such as the date of last update.

### ListRecords
Query: [https://www.arch14.cz/?verb=ListRecords](https://www.arch14.cz/?verb=ListRecords)

Retrieves all records of the database.

### GetRecord
Query: [https://www.arch14.cz/?verb=GetRecord&identifier=A14CZ_21-02-2023_3](https://www.arch14.cz/?verb=GetRecord&identifier=A14CZ_21-02-2023_3)

Retrieves one record based on the identifier.

### ListDictionary
Retrieves contents of different dictionaries used in the [query form](https://www.arch14.cz/?page=query).
The following dictionaries can be retrieved:
#### Country
Query: https://www.arch14.cz/?verb=ListDictionary&name=Country
#### District
Query: https://www.arch14.cz/?verb=ListDictionary&name=District
#### Cadastre
Query: https://www.arch14.cz/?verb=ListDictionary&name=Cadastre
#### Relative Dating
Query: https://www.arch14.cz/?verb=ListDictionary&name=Relative_Dating
#### Activity Area
Query: https://www.arch14.cz/?verb=ListDictionary&name=Activity_Area
#### Feature
Query: https://www.arch14.cz/?verb=ListDictionary&name=Feature
#### Material
Query: https://www.arch14.cz/?verb=ListDictionary&name=Material
