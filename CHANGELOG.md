## CHANGELOG ##

#### v1.0.1 (2013-XX-XX) ####
- [BC BREAK] Usunięcie ORMRepository.
- Generyczne repozytorium dla Doctrine. Pozwala na tworzenie repozytorium dla dowolnych klas obsługiwanych przez menedżera obiektów Doctrine (ORM, MongoDb).
- Implementacja metody `__toString()` w `Enum`. Dla wartości `StatusEnum::SOME_STATUS_CONST` zwraca `statusEnum.someStatusConst`.
- Utworzenie z `EnumUtil` pozwalającego na pobranie dostępnych wartości w Enumie.
- `Enum::__toString()` dla wartości `__NULL` zwraca pusty string

#### v1.0.0 (2013-02-19) ####

- Pierwsza wersja stabilna.