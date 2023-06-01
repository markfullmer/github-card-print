## Github Card Display

## Generate a list of issues from the GH CLI

```
REPO=""
HOST=""
gh api -X GET search/issues?order=asc\&sort=updated\&per_page=100 -f q="is:issue repo:$HOST/$REPO state:open" > $REPO.json
```
